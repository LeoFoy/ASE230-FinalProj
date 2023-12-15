<?php 
require_once("../../settings.php");
require_once("../../lib/db.php");

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();
}
if ($_SESSION['role']==0){
	$results = query($pdo,'SELECT Discussion_ID FROM discussion_board WHERE User_ID=?',[$_SESSION['user_id']]);
	$owned_posts = array();
	while($owned_post=$results->fetch()){
		$owned_posts[] = $owned_post['Discussion_ID'];
	}
	if (!in_array($_GET['id'], $owned_posts)){
		header('location: ../errors/error_not_authorized_in_this_area.php');
		exit();
	}
}
query($pdo, 'DELETE FROM discussion_board WHERE Discussion_ID=?',[$_GET['id']]);
header('location: index.php');

?>