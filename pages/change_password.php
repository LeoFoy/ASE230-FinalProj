<?php
require_once('../lib/functions.php');
require_once('../lib/csvFunc.php');

if(count($_POST) > 0){
	if (isset($_SESSION['username'])){ 
		if(isset($_POST['current_password']) && isset($_POST['new_password'])){
			if(password_verify($_POST['current_password'], $_SESSION['password'])) {
				$output = '';
				$fp = fopen('../data/users.csv.php', 'r');
				while (!feof($fp)){
					$line = fgets($fp);
					if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
					$line = explode(',', trim($line));
					if($line[0]==$_SESSION['username'] && $line[1]==$_SESSION['email'] && $line[2]==$_SESSION['phone']){
					//modify line
						$output.=$_SESSION['username'].','.$_SESSION['email'].','.$_SESSION['phone'].','.password_hash($_POST['new_password'], PASSWORD_DEFAULT).PHP_EOL;
					}else {
						$output.=$line[0].','.$line[1].','.$line[2].','.$line[3].PHP_EOL;	
					}	
				}
				fclose($fp);
				$_SESSION['password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
				$fp = fopen('../data/users.csv.php','w');
				fputs($fp, $output);
				fclose($fp);
				echo 'password changed successufully!';
			}
			else {
				echo 'password change unsuccessful, make sure you enter in correct credentials for your current password';
		}
		}
	}
}
else {
?>

<h1>Change Password</h1>
<form method="POST">
	Current Password:<input type="password" name="current_password" required></input><br>
	</br>
	New Password:<input type="password" name="new_password" required></input><br>
	</br>
	<button type="submit">Change Password</button>
</form>
<?php } ?>
<a href="../foot_in_door_website/index.php">Go back to home page</a>
