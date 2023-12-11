<?php
require_once('../lib/functions.php');
if(count($_POST) > 0){
	if (isset($_POST['username'][0]) && isset($_POST['password'][0])){ 
		$fp = fopen('../data/users.csv.php', 'r');
		while (!feof($fp)){
			$line = fgets($fp);
			if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
			$line = explode(',', trim($line));
			if($line[0]==$_POST['username'] && password_verify($_POST['password'], $line[3])) {
				//Sign the user in
				//1. Save the users data into the session
				//Redirect user to home page w logged in.
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['email'] = $line[1];
				$_SESSION['phone'] = $line[2];
				$_SESSION['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				header('location: ../foot_in_door_website/index.php');
			}
		}
		fclose($fp);	
	}
	if (empty($_SESSION)){
		echo 'INCORRECT LOGIN CREDENTIALS<br />';
		echo 'Try again: <a href="login.php">Retry Login</a><br />';
		
	}
}
else {
?>

<h1>Login with credentials</h1>
<form method="POST">
	Username:<input type="text" name="username" required></input><br>
	</br>
	Password:<input type="Password" name="password" required></input><br>
	</br>
	<button type="submit">Login</button>
</form>
<?php } ?>
Forgot Password?<a href="password_reset.php">Reset Password</a><br />
Forgot Username?<a href="password_reset.php">Reset Username</a><br />
<a href="../foot_in_door_website/index.php">Go back to home page</a>
<a href="signup.php">Sign up</a>
