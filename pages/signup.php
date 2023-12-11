<?php
require_once('../lib/functions.php');
$existingUser = False;
if(count($_POST) > 0){
	if (isset($_POST['username'][0]) && isset($_POST['email'][0]) && isset($_POST['phone'][0]) && isset($_POST['password'][0])){
		//check is account with username or email already exits
		$fp = fopen('../data/users.csv.php', 'r');
		while (!feof($fp)){
			$line = fgets($fp);
			if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
			$line = explode(',', trim($line));
			if($line[0]==$_POST['username'] || $line[1]==$_POST['email']) {
				echo 'Account with that username/email is already created!';
				$existingUser = True;
			}
		}
		if ($existingUser == False){
			//process information
			$fp = fopen('../data/users.csv.php', 'a+');
			fputs($fp, $_POST['username'].','.$_POST['email'].','.$_POST['phone'].','.password_hash($_POST['password'], PASSWORD_DEFAULT).PHP_EOL);
			fclose($fp);
			echo 'Account created!';	
		}
	}
	else
		echo 'username, email, phone, and password are missing';
}
else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign up</title>
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
				</svg><a class="navbar-brand" href="../foot_in_door_website/index.php">Foot In The Door</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../foot_in_door_website/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="create_resume.php">Create Resume</a></li>
						<li class="nav-item"><a class="nav-link" href="tips.php">Resume-Making Tips</a></li>
						<li class="nav-item"><a class="nav-link" href="discussion_board/discussion_board.php">Discussion Board</a></li>
						<li class="nav-item"><a class="nav-link" href="faq.php">FAQ/Support</a></li>
						<li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
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
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
					<h1>Welcome to Foot In The Door!<h1>
					<h2>Enter in information to create a new account<h2>
					<br>
					<form method="POST">
					    Username:&nbsp;<input type="text" name="username" required></input><br>
						</br>
						Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" required></input><br>
						</br>
						Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" pattern="[0-9]{3}[0-9]{2}[0-9]{3}" required></input><br>
						</br>
						Password:&nbsp;<input type="Password" name="password" required></input><br>
						</br>
						<button type="submit">Sign up</button>
					</form>
                </div>
            </div>
        </header>

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
<?php } ?>
<a href="../foot_in_door_website/index.php">Go back to home page</a>
