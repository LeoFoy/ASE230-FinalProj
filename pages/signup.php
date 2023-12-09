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

<h1>Welcome to foot in door!<h1>
<h2>Eneter in information to create a new account<h2>

<form method="POST">
	Username:<input type="text" name="username" required></input><br>
	</br>
	Email:<input type="email" name="email" required></input><br>
	</br>
	Phone:<input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" pattern="[0-9]{3}[0-9]{2}[0-9]{3}" required></input><br>
	</br>
	Password:<input type="Password" name="password" required></input><br>
	</br>
	<button type="submit">Sign up</button>
</form>
<?php } ?>
<a href="../foot_in_door_website/index.php">Go back to home page</a>
