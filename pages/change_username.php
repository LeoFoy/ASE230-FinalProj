<?php
require_once('../lib/functions.php');
require_once('../lib/csvFunc.php');
$existingUsername = False;

if(count($_POST) > 0){
	if (isset($_SESSION['username'])){ 
		if(isset($_POST['current_username']) && isset($_POST['new_username'])){
				//check if username already exists
			$fp = fopen('../data/users.csv.php', 'r');
			while (!feof($fp)){
				$line = fgets($fp);
				if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
				$line = explode(',', trim($line));
				if($line[0]==$_POST['new_username']) {
					echo 'Account with that username/email is already created!';
					$existingUsername = True;
				}
			}
			fclose($fp);
			if($existingUsername == False){
				$output = '';
				$fp = fopen('../data/users.csv.php', 'r');
				while (!feof($fp)){
					$line = fgets($fp);
					if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
					$line = explode(',', trim($line));
					if($line[0]==$_SESSION['username'] && $line[1]==$_SESSION['email'] && $line[2]==$_SESSION['phone']){
					//modify line
						$output.=$_POST['new_username'].','.$_SESSION['email'].','.$_SESSION['phone'].','.$_SESSION['password'].PHP_EOL;
					}else {
						$output.=$line[0].','.$line[1].','.$line[2].','.$line[3].PHP_EOL;
					}	
				}
			fclose($fp);
			$_SESSION['username'] = $_POST['new_username'];
			$fp = fopen('../data/users.csv.php','w');
			fputs($fp, $output);
			fclose($fp);
			echo 'username changed successufully!';
			}
		}
	}
}
else {
?>

<h1>Change Username</h1>
<form method="POST">
	Current Username:<input type="text" name="current_username" required></input><br>
	</br>
	New Username:<input type="text" name="new_username" required></input><br>
	</br>
	<button type="submit">Change Username!</button>
</form>
<?php } ?>
<a href="../foot_in_door_website/index.php">Go back to home page</a>
