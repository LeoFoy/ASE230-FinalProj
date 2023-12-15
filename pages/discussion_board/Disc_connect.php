<?php
require_once('../lib/db.php');
require_once('../settings.php');
require_once('../theme/header.php');
?>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder" name="topic">Career Connections</h1><br />
                    <a href="discussion_board/create.php" class="btn btn-primary mb-3">Create Post</a>
                    <?php
					$posts= query($pdo, 'SELECT * FROM users natural join discussion_board WHERE Topic=?',['Career Connections']);
					echo '<div class="container mt-5">';
					echo '<div class="table-responsive">';
					echo '<table class="table table-dark table-bordered table-striped">';
					echo '<thead class="thead-light">'; 
					echo '<thead>';
					echo '<tr>';
					echo '<th>User</th>';
					echo '<th>Title</th>';
					echo '<th>Description</th>';
					echo '<th>Date Posted</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					while($post=$posts->fetch()){
						echo '<tr>';
						echo '<td><a href="users/detail.php?id='.$post['User_ID'].'"</a>'.$post['Username'].'</td>';
						echo '<td>'.$post['Post_Title'].'</td>';
						echo '<td>'.$post['Post_Desc'].'</td>';
						echo '<td>'.$post['Date_Created'].'</td>';
						echo '</tr>';
					}
					echo '</table>';
					echo '</tbody>';
					echo '</table>';
					echo '</div>';
					echo '</div>';
					?>
					<br />
                    <a href="discussion_board.php" class="btn btn-primary mb-3">Back to Topics</a> 
                </div>
            </div>
        </header>
<?php
require_once('../theme/footer.php');
?>
