<?php
require_once('../settings.php');
require_once('../theme/header.php');
if (isset($_SESSION['user_id']) and isset($_SESSION['username']) and isset($_SESSION['role'])) {
?>

			<header class="bg-dark py-5">
				<div class="container px-4 px-lg-5 my-5">
					<div class="text-center text-white">
						<h1 class="display-6 fw-bolder">View Resume</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="#">Click to View Resume</a></p>
						<h1 class="display-6 fw-bolder">Change Password</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="change_password.php">Click to Change Password</a></p>
						<h1 class="display-6 fw-bolder">Change Username</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="change_username.php">Click to Change Username</a></p>
						<h1 class="display-6 fw-bolder">View User Info</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="users/detail.php?id=<?= $_SESSION['user_id'] ?>">Click to View Basic User Info</a></p>
						<?php if ($_SESSION['role']==1){ ?>
						<h1 class="display-6 fw-bolder">User Index</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="users/index.php">Go to index of all users</a></p>
						<h1 class="display-6 fw-bolder">Resume Index</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="resume/index.php">Go to index of all resumes</a></p>
						<?php } ?>
						<h1 class="display-6 fw-bolder">Sign Out</h1>
						<p class="lead fw-normal text-white-50 mb-0"><a "" href="signout.php">Click to Sign Out</a></p>
						
					</div>
				</div>
			</header>

<?php } else {
	header('location: errors/error_must_be_signedin_to_access_page.php');
	exit();
}
require_once('../theme/footer.php');
?>



