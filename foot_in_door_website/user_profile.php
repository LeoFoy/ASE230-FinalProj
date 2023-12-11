<?php
require_once('../lib/functions.php');
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="../foot_in_door_website/css/styles.css" rel="stylesheet" />
    </head>
	<body>
	        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
				<path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
				</svg><a class="navbar-brand" href="#!">Foot In Door</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../foot_in_door_website/index.php">Home</a></li>
                    </ul>
					<form class="d-flex">
                        <button class="btn btn-outline-dark" >
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
						</svg>
						<?php
						if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
							<a class="nav-link" href="../pages/user_profile.php">Welcome <?= $_SESSION['username'] ?></a>
						<?php } else die(); ?>
                            
                        </button>
                    </form>
                </div>
            </div>
        </nav>


			<header class="bg-dark py-5">
				<div class="container px-4 px-lg-5 my-5">
					<div class="text-center text-white">
						<h1 class="display-6 fw-bolder">View Resume</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="#">Click to View Resume</a></p>
						<h1 class="display-6 fw-bolder">Change Password</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="change_password.php">Click to Change Password</a></p>
						<h1 class="display-6 fw-bolder">Change Username</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="change_username.php">Click to Change Username</a></p>
						<h1 class="display-6 fw-bolder">View Basic User Info</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="show_user_info.php">Click to View Basic User Info</a></p>
						<h1 class="display-6 fw-bolder">Sign Out</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="signout.php">Click to Sign Out</a></p>
						<h1 class="display-6 fw-bolder">Delete Account</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="delete.php">Click to Delete Account</a></p>
						
					</div>
				</div>
			</header>
	</body>
</html>


<?php } else {
die(); }?>

