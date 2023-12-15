<?php 
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();
}
if ($_SESSION['role']==0 && $_SESSION['user_id']!=$_GET['id']){
	header('location: ../errors/error_not_authorized_in_this_area.php');
}

if (count($_POST)>0){
	$results=query($pdo, 'SELECT * FROM users WHERE Username=?',[$_POST['username']]);
	if($results->rowCount()>0) {
		#so that a user cannot change the username to one that already exists
		if (($_POST['username'] != $_SESSION['username']) && $_SESSION['role'] != 1){
			echo 'another user is already registered under that username, enter a new one';
			exit();
		}		
	}
	if(isset($_POST['password']{0})){
		query($pdo, 'UPDATE users SET Username=?, Email=?, Password=?, Phone_Number=? WHERE User_ID=?', [$_POST['username'],$_POST['email'],password_hash($_POST['password'], PASSWORD_DEFAULT),$_POST['phone_number'], $_POST['id']]);
	}
	else {
		query($pdo, 'UPDATE users SET Username=?, Email=?, Phone_Number=? WHERE User_ID=?', [$_POST['username'],$_POST['email'],$_POST['phone_number'], $_POST['id']]);
	}
}

$users=query($pdo, 'SELECT * FROM users WHERE User_ID=?', [$_GET['id']]);
$user=$users->fetch();
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
			<h1>Edit User</h1>
				<form method="POST">
					<h4>Username<h4>
					<input type="text" name="username" value="<?= $user['Username'] ?>" />
					<h4>Email<h4>
					<input type="email" name="email" value="<?= $user['Email'] ?>" />
					<h4>Password<h4>
					<input type="password" name="password" />
					<h4>Phone Number<h4>
					<input type="text" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= $user['Phone_Number'] ?>" />
					<p>
						<input type="hidden" name="id" value="<?= $user['User_ID'] ?>" />
						<br /><button type="submit">Save Changes</button><br />
						<?php
						if ($_SESSION['role']==0) {
							echo '<br /><a href="detail.php?id='.$_GET['id'].'" class="btn btn-primary mb-3">Go back to user detail</a>';
						}
						if ($_SESSION['role']==1) {
							echo '<br /><a href="index.php" class="btn btn-primary mb-3">Go to User Index</a>';
						}
						?>
					</p>
				</form>
		</div>
    </div>
</header>
<?php
require_once("../../theme/footer.php");
?>
