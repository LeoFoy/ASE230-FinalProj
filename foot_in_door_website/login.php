<<<<<<< HEAD
<?php
require_once('../theme/header.php');
?>

<header class="bg-dark py-5">
		<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
					<h1>Login with credentials</h1>
					<form method="POST" action="../lib/auth/auth.php">
						Username:<input type="text" name="username" required></input><br>
						</br>
						Password:<input type="Password" name="password" required></input><br>
						</br>
						<button type="submit" name="action" value="signin">Sign in</button>
					</form>
					<a href="../foot_in_door_website/index.php">Go back to home page</a><br />
					<a href="signup.php">Sign up</a>
				</div>
            </div>
        </header>
<?php
require_once('../theme/footer.php');
?>
=======
<h1>Login with credentials</h1>
<form method="POST" action="../lib/auth/auth.php">
	Username:<input type="text" name="username" required></input><br>
	</br>
	Password:<input type="Password" name="password" required></input><br>
	</br>
	<button type="submit" name="action" value="signin">Sign in</button>
</form>
<a href="../foot_in_door_website/index.php">Go back to home page</a><br />
<a href="signup.php">Sign up</a>
>>>>>>> 098617f4b1ba0ccc21aac443569c025b93e5d4a9
