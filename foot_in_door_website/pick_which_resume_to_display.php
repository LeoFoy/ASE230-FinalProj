<?php
require_once('../lib/db.php');
require_once('../settings.php');
require_once('../theme/header.php');

if (!isset($_SESSION['user_id']) && !isset($_SESSION['username']) && !isset($_SESSION['role'])){
	header('location: errors/error_must_be_signedin_to_access_page.php');
	exit();
}
	
if($_SESSION['role']==0 && $_SESSION['user_id']!=$_GET['id']){
		header('location: errors/error_not_authorized_in_this_area.php');
		exit();
}

$user_id = $_GET['id'];       
//get the resume id to insert data into the other tables
$resumes = query($pdo, 'SELECT * FROM resume WHERE User_ID=?', [$user_id]);
		
echo '<div class="container mt-5">';
echo '<h1>Pick Which Resume You Want To Display</h1>';
echo '<a href="create.php" class="btn btn-primary mb-3">Create a new resume</a>';
echo '<div class="table-responsive">';
echo '<table class="table table-bordered table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>Resume_ID</th>';
echo '<th>Name</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';	
	while ($resume=$resumes->fetch()){
		echo '<tr>';
		echo '<td><a href="display_resume.php?id='.$resume['Resume_ID'].'">'.$resume['Resume_ID'].'</a></td>';
		echo '<td><a href="display_resume.php?id='.$resume['Resume_ID'].'">'.$resume['Name'].'</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
	echo '</div>';
		
require_once('../theme/footer.php');		
?>
