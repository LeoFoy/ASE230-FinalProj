<?php
print_r($_POST);
if(count($_POST)>0 && isset($_POST['action']{0})){
	if($_POST['action']=='signup') signup();
	else signin();
}

function signup(){
	require_once("../db.php");
	require_once("../../settings.php");
	$results=query($pdo, 'SELECT * FROM users WHERE Username=?',[$_POST['username']]);
	print_r($_POST);
	if($results->rowCount()>0) die('The username has already been registered');
	else query($pdo, 'INSERT INTO users(Username, Email, Password, Phone_Number) VALUES(?,?,?,?)',[$_POST['username'],$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['phone']]);
	header('location:../../foot_in_door_website/index.php');
}

function signin(){
	require_once("../db.php");
	require_once("../../settings.php");
	
	$result=query($pdo, 'SELECT * FROM users WHERE Username=?',[$_POST['username']]);
	if($result->rowCount()==0) die('The user is not registered');
	$result=$result->fetch();
	if(!password_verify($_POST['password'], $result['Password'])) die('The password in not correct');
	$_SESSION['username'] = $result['Username'];
	$_SESSION['email'] = $result['Email'];
	header('location:../../foot_in_door_website/index.php');
}
?>