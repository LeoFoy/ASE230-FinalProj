<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$usersArray = csvFiletoArrayWithFourIndexes('../../data/users.csv.php');
$existingUser = False;

if(count($_POST)>0){
	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])){
		//check is account with username or email already exits
		$fp = fopen('../../data/users.csv.php', 'r');
		while (!feof($fp)){
			$line = fgets($fp);
			if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
			$line = explode(',', trim($line));
			if($line[0]==$_POST['username'] || $line[1]==$_POST['email']) {
				echo 'Account with that username/email is already created!';
				$existingUser = True;
			}
		}
		fclose($fp);
		
		if($existingUser == False){
			require_once('../../lib/db.php');
			query($pdo,'INSERT INTO users (username,password,Phone_Number,Email) VALUES(?,?,?,?)',[$_POST['username'],$_POST['password'],$_POST['phone'],$_POST['email']]);
			
			$fp = fopen('../../data/users.csv.php', 'a+');
			fwrite($fp, $_POST['username'].','.$_POST['email'].','.$_POST['phone'].','.password_hash($_POST['password'], PASSWORD_DEFAULT).PHP_EOL);
			fclose($fp);
			header('location: index.php');
		}
	}else echo 'missing username, email, phone number, or password!';
}
else { ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	<h1>Create a new user</h1>
	username: <input type="text" name="username" required></input><br></br>
	email: <input type="email" name="email" required></input><br></br>
	phone:<input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required></input>(***-***-****) format<br></br>
	password: <input type="password" name="password" required></input>
	<button type="submit">Create User</button>
</form>
<?php } ?>
<a href="index.php">go back to index</a>
