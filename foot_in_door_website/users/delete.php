<?php 
require_once("../../settings.php");
require_once("../../lib/db.php");

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();
}
if ($_SESSION['role']==0 && $_SESSION['user_id']!=$_GET['id']){
	header('location: ../errors/error_not_authorized_in_this_area.php');
}
query($pdo, 'DELETE FROM users WHERE User_ID=?',[$_GET['id']]);
header('location: index.php');

?>
