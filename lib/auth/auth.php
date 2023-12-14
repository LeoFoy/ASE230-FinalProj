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
	if($results->rowCount()>0) {
		header('location: ../../foot_in_door_website/errors/error_user_already_registered.php');
		exit();
	}
	else query($pdo, 'INSERT INTO users(Username, Email, Password, Phone_Number) VALUES(?,?,?,?)',[$_POST['username'],$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['phone']]);
	header('location:../../foot_in_door_website/index.php');
	exit();
}

function signin(){
	require_once("../db.php");
	require_once("../../settings.php");

	$result=query($pdo, 'SELECT * FROM users WHERE Username=?',[$_POST['username']]);
	if($result->rowCount()==0){
		header('location: ../../foot_in_door_website/errors/error_unregistered_user.php');
		exit();
	}
	$result=$result->fetch();
	if(!password_verify($_POST['password'], $result['Password'])){
		header('location: ../../foot_in_door_website/errors/error_incorrect_password.php');
		exit();
	}
	$_SESSION['user_id'] = $result['User_ID'];
	$_SESSION['username'] = $result['Username'];
	$_SESSION['role'] = $result['Role'];
	header('location:../../foot_in_door_website/index.php');
	exit();
}

function change_username(){
	require_once("../db.php");
	require_once("../../settings.php");

	if (isset($_SESSION['user_id']) and isset($_SESSION['username']) and isset($_SESSION['role'])){
		$result=query($pdo, 'SELECT * FROM users WHERE User_ID=? AND Username=?',[$_SESSION['user_id'], $_POST['current_username']]);
		if($result->rowCount()==0) {
			header('location: ../../foot_in_door_website/errors/error_unable_to_change_username.php');
			exit();
		}
		$result=$result->fetch();
		query($pdo, 'UPDATE users SET users.Username=? WHERE users.User_ID=?',[$_POST['new_username'], $_SESSION['user_id']]);
		header('location:../../foot_in_door_website/index.php');
		exit();
	}
	else header('location: ../../foot_in_door_website/errors/error_must_be_signedin_to_access_page.php');
	exit();
}

function change_password(){
	require_once("../db.php");
	require_once("../../settings.php");

	if (isset($_SESSION['user_id']) and isset($_SESSION['username']) and isset($_SESSION['role'])){
		$result=query($pdo, 'SELECT * FROM users WHERE User_ID=? AND Username=?',[$_SESSION['user_id'], $_SESSION['username']]);
		#if($result->rowCount()==0) die('Log in first to try to manipulate credentials!'); #maybe change this???
		$result=$result->fetch();
		if(!password_verify($_POST['current_password'], $result['Password'])){
			header('location: ../../foot_in_door_website/errors/error_unable_to_change_password.php');
			exit();
		}
		else query($pdo, 'UPDATE users SET users.Password=? WHERE users.User_ID=?',[password_hash($_POST['new_password'],PASSWORD_DEFAULT), $_SESSION['user_id']]);
		header('location:../../foot_in_door_website/index.php');
		exit();
	}
	else header('location: ../../foot_in_door_website/errors/error_must_be_signedin_to_access_page.php');
	exit();
}

?>