<?php
require_once('../../lib/db.php');
require_once('../../settings.php');
require_once('../../theme/header.php');

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: errors/error_must_be_signedin_to_access_page.php');
	exit();
}


if (count($_POST)>0){
	$date_created = date('Y-m-d');
	$post = query($pdo, 'INSERT INTO discussion_board (User_ID,Post_Title,Topic,Post_Desc,Date_Created) VALUES(?,?,?,?,?)',[$_SESSION['user_id'],$_POST['title'],$_POST['topic'],$_POST['desc'],$date_created]);
	header('location: index.php');
	
}



?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">New Post</h1>
            <form method="POST" >
                <p>Topic: </p>
                <select name="topic" required>
                    <option value="Career Connections">Career Connections</option>
                    <option value="Celebration">Celebrations</option>
                    <option value="Interview Strategies">Interview Strategies</option>
                </select>
                <p>Title:</p>
                <input size="50" type="text" name="title" required></input><br>
                </br>
                <p>Post Description:</p>
                <textarea rows="20" cols="100" name="desc" required></textarea><br>
                </br>
                <button type="submit" class="btn btn-primary mb-3">Post</button>
            </form>
            <a href="../discussion_board.php" class="btn btn-primary mb-3">Back to Topics</a>
        </div>
    </div>
</header>
<?php
require_once('../../theme/footer.php');
?>