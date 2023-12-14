<?php
require_once("../settings.php");
<<<<<<< HEAD
require_once("../theme/header.php");
=======
>>>>>>> 098617f4b1ba0ccc21aac443569c025b93e5d4a9
if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: errors/error_must_be_signedin_to_access_page.php');
	exit();
}
?>

<<<<<<< HEAD
<header class="bg-dark py-5">
     <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
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
		</div>
    </div>
</header>
<?php
require_once("../theme/footer.php");
?>
=======
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
>>>>>>> 098617f4b1ba0ccc21aac443569c025b93e5d4a9
