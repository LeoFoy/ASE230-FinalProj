<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();
}
if($_SESSION['role']==0 && $_SESSION['user_id']!=$_GET['user_id']){
		header('location: ../errors/error_not_authorized_in_this_area.php');
		exit();
}

$resumes = query($pdo, 'SELECT * FROM resume WHERE Resume_ID=?', [$_GET['id']]);

echo '<div class="container mt-5">';
echo '<h1>Resume Detail</h1>';
if ($_SESSION['role']==1){
	echo '<a href="index.php" class="btn btn-primary mb-3">Go to resume index</a>';
}
echo '<div class="table-responsive">';
echo '<table class="table table-bordered table-striped">';
            
echo '<thead>';
echo '<tr>';
echo '<th>Resume ID</th>';
echo '<th>Resume Phone Number</th>';
echo '<th>Email</th>';
echo '<th>LinkedIn</th>';
echo '<th>GitHub</th>';
echo '<th>Website</th>';
echo '<th>Summary</th>';
echo '<th>Date Created</th>';
echo '<th>User ID</th>';
echo '<th>Name</th>';
echo '<th>Edit Resume</th>';
echo '<th>Delete Resume</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($resume=$resumes->fetch()){
	echo '<tr>';
	echo '<td>'.$resume['Resume_ID'].'</td>';
	echo '<td>'.$resume['Phone_Number'].'</td>';
	echo '<td>'.$resume['Email'].'</td>';
	echo '<td>'.$resume['Linkedin'].'</td>';
	echo '<td>'.$resume['Github'].'</td>';
	echo '<td>'.$resume['Personal_Website'].'</td>';
	echo '<td>'.$resume['Summary'].'</td>';
	echo '<td>'.$resume['Date_Created'].'</td>';
	echo '<td><a href="../users/detail.php?id='.$resume['User_ID'].'">'.$resume['User_ID'].'</td>';
	echo '<td><a href="../users/detail.php?id='.$resume['User_ID'].'">'.$resume['Name'].'</td>';
	echo '<td><a href="edit.php?resume_id='.$resume['Resume_ID'].'&user_id='.$resume['User_ID'].'">Edit</a></td>';
	echo '<td><a href="delete.php?resume_id='.$resume['Resume_ID'].'&user_id='.$resume['User_ID'].'">Delete</a></td>';
	echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
require_once("../../theme/footer.php");
?>