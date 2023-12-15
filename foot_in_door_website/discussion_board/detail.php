<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

$posts = query($pdo, 'SELECT * FROM discussion_board natural join users WHERE Discussion_ID=?', [$_GET['id']]);

echo '<div class="container mt-5">';
	echo '<h1>Discussion Board Index</h1>';
	echo '<a href="index.php" class="btn btn-primary mb-3">Go to index of all post</a><br />';
	echo '<div class="table-responsive">';
	echo '<table class="table table-bordered table-striped">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Discussion Board ID</th>';
	echo '<th>Title</th>';
	echo '<th>Topic</th>';
	echo '<th>Description</th>';
	echo '<th>Date Created</th>';
	echo '<th>User ID</th>';
	echo '<th>Username</th>';
	echo '<th>Edit Post</th>';
	echo '<th>Delete Post</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	
	$post=$posts->fetch();
	echo '<tr>';
	echo '<td>'.$post['Discussion_ID'].'</td>';
	echo '<td>'.$post['Post_Title'].'</td>';
	echo '<td>'.$post['Topic'].'</td>';
	echo '<td>'.$post['Post_Desc'].'</td>';
	echo '<td>'.$post['Date_Created'].'</td>';
	echo '<td><a href="../users/detail.php?id='.$post['User_ID'].'">'.$post['User_ID'].'</td>';
	echo '<td><a href="../users/detail.php?id='.$post['User_ID'].'">'.$post['Username'].'</td>';
	if (($_SESSION['role']==0 && $_SESSION['user_id']==$post['User_ID']) || ($_SESSION['role']==1)){
	echo '<td><a href="edit.php?id='.$post['Discussion_ID'].'">Edit</a></td>';
	echo '<td><a href="delete.php?id='.$post['Discussion_ID'].'">Delete</a></td>';
	}
	echo '</tr>';
	echo '</table>';
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
	echo '</div>';
	
require_once("../../theme/footer.php");