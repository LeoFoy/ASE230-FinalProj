<?php
require_once("../settings.php");
if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: errors/error_must_be_signedin_to_access_page.php');
	exit();
}
?>

<h1>Change Password</h1>
<form method="POST" action="../lib/auth/auth.php">
	Current Password:<input type="password" name="current_password" required></input><br>
	</br>
	New Password:<input type="password" name="new_password" required></input><br>
	</br>
	<button type="submit" name="action" value="change_password">Change Password</button>
</form>
<a href="user_profile.php">Go back to profile</a><br />
<a href="index.php">Go to home page</a>
