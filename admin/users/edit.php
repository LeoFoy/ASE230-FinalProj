<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$usersArray = csvFiletoArrayWithFourIndexes('../../data/users.csv.php');
$user = $usersArray[$_GET['index']];

if (count($_POST)>0){
	$output = '';
	$fp = fopen('../../data/users.csv.php','r');
	//Have to make index = -1 since the first line of users.csv.php is a php die() function.
	$index = -1;
	while(!feof($fp)){
		$line = fgets($fp);
		if($index==$_GET['index']){
			//modify line
			$output.=$_POST['username'].','.$_POST['email'].','.$_POST['phone'].','.password_hash($_POST['password'], PASSWORD_DEFAULT).PHP_EOL;
		} else{
			//put line into output
			$output.=$line;
		}
		$index++;
	}
	fclose($fp);
	$fp = fopen('../../data/users.csv.php','w');
	fputs($fp, $output);
	fclose($fp);
	header('location: index.php');
	
}else {?>
<form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST">
	<h1>Update User</h1>
	Username: <input type='text' name="username" value="<?= $user[0] ?>" required></input><br></br>
	Email: <input type='email' name="email" value="<?= $user[1] ?>" required></input><br></br>
	Phone: <input type='phone' name="phone"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= $user[2] ?>" required></input>(***-***-****) format<br></br>
	Password: <input type='password' name="pasword" value="<?= $user[3] ?>" required></input><br></br>
	<button type="submit">Update User</button>
</form>
<?php
} ?>
<a href='index.php'>Go back to user index</a>
