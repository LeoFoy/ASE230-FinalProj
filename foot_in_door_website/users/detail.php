<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

$users = query($pdo, 'SELECT User_ID, Username, Email, Role, Phone_Number FROM users WHERE User_ID=?', [$_GET['id']]);

echo '<div class="container mt-5">';
echo '<h1>User Detail</h1>';
echo '<a href="index.php" class="btn btn-primary mb-3">Go back to user index</a>';
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
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
require_once("../../theme/footer.php");
?>