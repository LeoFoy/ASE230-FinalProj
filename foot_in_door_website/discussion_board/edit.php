<?php 
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

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

if (count($_POST)>0){
	query($pdo, 'UPDATE discussion_board SET Post_Title=?, Topic=?, Post_Desc=? WHERE Discussion_ID=?', [$_POST['title'],$_POST['topic'],$_POST['description'], $_GET['id']]);
	header('location: index.php');
}

$posts=query($pdo, 'SELECT * FROM discussion_board WHERE Discussion_ID=?', [$_GET['id']]);
$post=$posts->fetch();
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
		<a href="index.php" class="btn btn-primary mb-3">See all posts</a><br />
			<h1>Edit User</h1>
				<form method="POST">
					<h4>Title<h4>
					<input type="text" name="title" value="<?= $post['Post_Title'] ?>" />
					<h4>Topic<h4>
						<select name="topic" required>
						<option value="Career Connections">Career Connections</option>
						<option value="Celebrations">Celebrations</option>
						<option value="Interview Strategies">Interview Strategies</option>
					</select>
					<h4>Description<h4>
					<input type="text" name="description" value="<?= $post['Post_Desc'] ?>" /><br />
						<br /><button type="submit">Save Changes</button>
				</form>
		</div>
    </div>
</header>
<?php
require_once("../../theme/footer.php");
?>
