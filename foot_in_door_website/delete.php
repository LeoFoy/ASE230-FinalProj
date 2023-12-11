<?php
require_once('../lib/functions.php');
require_once('../lib/csvFunc.php');

if(count($_POST) > 0){
	if (isset($_SESSION['username'])){ 
		if(isset($_POST['submit'])){
				$output = '';
				$fp = fopen('../data/users.csv.php', 'r');
				while (!feof($fp)){
					$line = fgets($fp);
					if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
					$line = explode(',', trim($line));
					if($line[0]!=$_SESSION['username']){
					//modify line
						$output.=$line[0].','.$line[1].','.$line[2].','.$line[3].PHP_EOL;
					}
				}
				fclose($fp);
				$fp = fopen('../data/users.csv.php','w');
				fputs($fp, $output);
				fclose($fp);
				session_destroy();
				header('location: ../foot_in_door_website/index.php');
		}

	}
}
else {
?>

<h1>Delete Account</h1>
<form method="POST">
	Are you sure you want to delete account?:<button type="submit" name='submit'>Click to Delete Account</button>
</form>
<?php } ?>
<a href="../foot_in_door_website/index.php">Go back to home page</a>
<a href="signout.php">Sign Out Instead</a>
<a href="user_profile.php">Go back to profile</a>