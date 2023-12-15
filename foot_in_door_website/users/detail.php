<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

$users = query($pdo, 'SELECT User_ID, Username, Email, Role, Phone_Number FROM users WHERE User_ID=?', [$_GET['id']]);
$resumes = query($pdo, 'SELECT * FROM resume WHERE User_ID=?', [$_GET['id']]);
$posts = query($pdo, 'SELECT * FROM discussion_board WHERE User_ID=?', [$_GET['id']]);

echo '<div class="container mt-5">';
echo '<h1>User Detail</h1>';
if ($_SESSION['role']==1){
	echo '<a href="index.php" class="btn btn-primary mb-3">Go to users index</a>';
}
echo '<div class="table-responsive">';
echo '<table class="table table-bordered table-striped">';
            
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Username</th>';
echo '<th>Email</th>';
echo '<th>Role</th>';
echo '<th>Phone Number</th>';
if ($_SESSION['role']==0 && $_SESSION['user_id']==$_GET['id']){
echo '<th>Edit User</th>';
echo '<th>Delete User</th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($user=$users->fetch()){
	echo '<tr>';
	echo '<td>'.$user['User_ID'].'</a></td>';
	echo '<td>'.$user['Username'].'</td>';
	echo '<td>'.$user['Email'].'</td>';
	echo '<td>'.$user['Role'].'</td>';
	echo '<td>'.$user['Phone_Number'].'</td>';
	if (($_SESSION['role']==0 && $_SESSION['user_id']==$_GET['id']) || ($_SESSION['role']==1)){
	echo '<td><a href="edit.php?id='.$user['User_ID'].'">Edit</a></td>';
	echo '<td><a href="delete.php?id='.$user['User_ID'].'">Delete</a></td>';
	}
	echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';


if (($_SESSION['role']==0 && $_SESSION['user_id']==$_GET['id']) || ($_SESSION['role']==1 )){
	#display all resumes created for given user
	echo '<div class="container mt-5">';
	echo '<h1>Resumes Created by User</h1>';
	if ($_SESSION['role']==1){
		echo '<a href="../resume/index.php" class="btn btn-primary mb-3">Go to all resumes index</a>';
	}
	echo '<div class="table-responsive">';
	echo '<table class="table table-bordered table-striped">';
				
	echo '<thead>';
	echo '<tr>';
	echo '<th>Resume_ID</th>';
	echo '<th>Resume Phone Number</th>';
	echo '<th>Email</th>';
	echo '<th>LinkedIn</th>';
	echo '<th>GitHub</th>';
	echo '<th>Website</th>';
	echo '<th>Date Created</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	while ($resume=$resumes->fetch()){
		echo '<tr>';
		echo '<td><a href="../resume/detail.php?id='.$resume['Resume_ID'].'&user_id='.$resume['User_ID'].'">'.$resume['Resume_ID'].'</td>';
		echo '<td>'.$resume['Phone_Number'].'</td>';
		echo '<td>'.$resume['Email'].'</td>';
		echo '<td>'.$resume['Linkedin'].'</td>';
		echo '<td>'.$resume['Github'].'</td>';
		echo '<td>'.$resume['Personal_Website'].'</td>';
		echo '<td>'.$resume['Date_Created'].'</td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
	echo '</div>';
	
	
	
	#display all discussion board posts for given user
	echo '<div class="container mt-5">';
	echo '<h1>Discussion Board Posts made by User</h1>';
	echo '<a href="../discussion_board/index.php" class="btn btn-primary mb-3">Go to all resumes index</a>';
	echo '<div class="table-responsive">';
	echo '<table class="table table-bordered table-striped">';
				
	echo '<thead>';
	echo '<tr>';
	echo '<th>Discussion Board ID</th>';
	echo '<th>Title</th>';
	echo '<th>Topic</th>';
	echo '<th>Description</th>';
	echo '<th>Date Created</th>';;
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	while ($post=$posts->fetch()){
		echo '<tr>';
		echo '<td><a href="../discussion_board/detail.php?id='.$post['Discussion_ID'].'">'.$post['Discussion_ID'].'</td>';
		echo '<td>'.$post['Post_Title'].'</td>';
		echo '<td>'.$post['Topic'].'</td>';
		echo '<td>'.$post['Post_Desc'].'</td>';
		echo '<td>'.$post['Date_Created'].'</td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
	echo '</div>';
	
	}
require_once("../../theme/footer.php");
?>