<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

if ($_SESSION['role']==1){
	$users = query($pdo, 'SELECT User_ID, Username, Email, Role, Phone_Number FROM users');
	
	echo '<div class="container mt-5">';
	echo '<h1>Users Index</h1>';
	echo '<a href="create.php" class="btn btn-primary mb-3">Create a new user</a>';
	echo '<div class="table-responsive">';
	echo '<table class="table table-bordered table-striped">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>Username</th>';
	echo '<th>Email</th>';
	echo '<th>Role</th>';
	echo '<th>Phone Number</th>';
	echo '<th>Edit User</th>';
	echo '<th>Delete User</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	while ($user=$users->fetch()){
		echo '<tr>';
		echo '<td><a href="detail.php?id='.$user['User_ID'].'">'.$user['User_ID'].'</a></td>';
		echo '<td><a href="detail.php?id='.$user['User_ID'].'">'.$user['Username'].'</td>';
		echo '<td>'.$user['Email'].'</td>';
		echo '<td>'.$user['Role'].'</td>';
		echo '<td>'.$user['Phone_Number'].'</td>';
		echo '<td><a href="edit.php?id='.$user['User_ID'].'">Edit</a></td>';
		echo '<td><a href="delete.php?id='.$user['User_ID'].'">Delete</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
	echo '</div>';
}
else if($_SESSION['role']==0 && isset($_SESSION['user_id'])){
	#direct users to the detail page! since only admin should be able to view the index of all the users and only the specific user can view their info!
	header('location: detail.php?id='.$_SESSION['user_id']);
	exit();
	
}
else {
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();

}	

require_once("../../theme/footer.php");
	
?>
