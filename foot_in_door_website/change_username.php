<?php
require_once("../settings.php");
require_once("../theme/header.php");
if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: errors/error_must_be_signedin_to_access_page.php');
	exit();
}
?>

<header class="bg-dark py-5">
     <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
			<h1>Change Username</h1>
			<form method="POST" action="../lib/auth/auth.php">
				Current Username:<input type="text" name="current_username" required></input><br>
				</br>
				New Username:<input type="text" name="new_username" required></input><br>
				</br>
				<button type="submit" name="action" value="change_username">Change Username</button>
			</form>
			<a href="user_profile.php">Go back to profile</a><br />
			<a href="../foot_in_door_website/index.php">Go to home page</a>
		</div>
    </div>
</header>
<?php
require_once("../theme/footer.php");
?>

<h1>Change Username</h1>
<form method="POST" action="../lib/auth/auth.php">
	Current Username:<input type="text" name="current_username" required></input><br>
	</br>
	New Username:<input type="text" name="new_username" required></input><br>
	</br>
	<button type="submit" name="action" value="change_username">Change Username</button>
</form>
<a href="user_profile.php">Go back to profile</a><br />
<a href="../foot_in_door_website/index.php">Go to home page</a>

