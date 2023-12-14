<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();
}
if ($_SESSION['role']!=1){
	header('location: ../errors/error_not_authorized_in_this_area.php');
}

if (count($_POST)>0){
	$results=query($pdo, 'SELECT * FROM users WHERE Username=?',[$_POST['username']]);
	if($results->rowCount()>0) {
		header('location: ../errors/error_user_already_registered.php');
		exit();
	}
	else query($pdo, 'INSERT INTO users(Username, Email, Password, Phone_Number) VALUES(?,?,?,?)',[$_POST['username'],$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['phone_number']]);
	header('location: index.php');
	exit();
}


?>
<?php
require_once('../../lib/db.php');
$users = query($pdo, 'SELECT User_ID, Username FROM users');
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
			<h1>Create Resume</h1>
				<form method="POST">
					<h4>Name</h4>
					<input type="text" name="username" />
					<h4>Choose a User to create Resume for:<h4>
					<select name="selectedUser">
					<?php 
					while($user=$users->fetch()){
						echo '<option  value="'.$user['User_ID'].'">'.$user['Username'].'</option>';
					}?>
					<<h4>Email</h4>
					<input type="email" name="email" />
					<h4>Phone Number</h4>
					<input type="text" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
					<p>
					<h4>Linkedin</h4>
					<input type="text" name="linkedin" />
					<h4>Personal Website</h4>
					<input type="text" name="website" />
					<h4>Summary</h4>
					<input type="text" name="summary" /><br />
					
						<input type="hidden" name="id" />
						<button type="submit">Create User</button>
					</p>
				</form>
		</div>
    </div>
</header>
<?php
require_once("../../theme/footer.php");
?>