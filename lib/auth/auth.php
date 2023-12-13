<?php
if(count($_POST)>0 && isset($_POST['action']{0})){
	if($_POST['action']=='signup') signup();
	if($_POST['action']=='signin') signin();
	if($_POST['action']=='change_username') change_username();
	else change_password();
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
	$_SESSION['user_id'] = $result['User_ID'];
	$_SESSION['username'] = $result['Username'];
	$_SESSION['role'] = $result['Role'];
	header('location:../../foot_in_door_website/index.php');
}

function change_username(){
	require_once("../db.php");
	require_once("../../settings.php");
	
	if (isset($_SESSION['user_id']) and isset($_SESSION['username']) and isset($_SESSION['role'])){
		$result=query($pdo, 'SELECT * FROM users WHERE User_ID=? AND Username=?',[$_SESSION['user_id'], $_POST['current_username']]);
		if($result->rowCount()==0) die('Current username is not correct, unable to change username.'); #maybe change this??? move "chnage_username and chnage password" into just the user profile and on the sign in/log in page!
		$result=$result->fetch();
		#if($_POST['current_username'] != $_SESSION['username']) die('Current username is not correct, unable to change username.');
		query($pdo, 'UPDATE users SET users.Username=? WHERE users.User_ID=?',[$_POST['new_username'], $_SESSION['user_id']]);
		header('location:../../foot_in_door_website/index.php');
	}
	else echo 'Must be signed in to change credentials!';
}

function change_password(){
	require_once("../db.php");
	require_once("../../settings.php");
	
	if (isset($_SESSION['user_id']) and isset($_SESSION['username']) and isset($_SESSION['role'])){
		$result=query($pdo, 'SELECT * FROM users WHERE User_ID=? AND Username=?',[$_SESSION['user_id'], $_SESSION['username']]);
		if($result->rowCount()==0) die('Log in first to try to manipulate credentials!'); #maybe change this???
		$result=$result->fetch();
		if(!password_verify($_POST['current_password'], $result['Password'])) die('Current password is not correct, unable to change password.');
		else query($pdo, 'UPDATE users SET users.Password=? WHERE users.User_ID=?',[password_hash($_POST['new_password'],PASSWORD_DEFAULT), $_SESSION['user_id']]);
		header('location:../../foot_in_door_website/index.php');
	}
	else echo 'Must be signed in to change credentials!';
	
}
?>