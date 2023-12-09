<?php
require_once('../lib/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../foot_in_door_website/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../foot_in_door_website/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
				<path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
				</svg><a class="navbar-brand" href="../foot_in_door_website/index.php">Foot In Door</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../foot_in_door_website/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../pages/create_resume.php">Create Resume</a></li>
						<li class="nav-item"><a class="nav-link" href="../pages/templates.php">Templates</a></li>
						<li class="nav-item"><a class="nav-link" href="../pages/tips.php">Resume-Making Tips</a></li>
						<li class="nav-item"><a class="nav-link" href="../pages/discussion_board.php">Discussion Board</a></li>
						<li class="nav-item"><a class="nav-link" href="../pages/faq.php">FAQ/Support</a></li>
						<li class="nav-item"><a class="nav-link" href="../pages/contact_us.php">Contact Us</a></li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" >
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
						</svg>
						<?php
						if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
							<a class="nav-link" href="../pages/user_profile.php">Go To Profile</a>
						<?php } else { ?>
							<a class="nav-link" href="../pages/signup_or_login.php">Signup/Login</a>
						<?php } ?>
                            
                        </button>
                    </form>
                </div>
            </div>
        </nav>
		
<h2>Are you new to foot in door?</h2>
<p>If so</p><a href="signup.php">Sign up now!</a>
<p>If not</p><a href="login.php">Log in now!</a>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Foot in Door 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../foot_in_door_website/js/scripts.js"></script>
	</body>
</html>
