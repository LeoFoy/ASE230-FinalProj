<?php
    require_once('../lib/functions.php');
?>

<?php
require_once('../theme/header.php');
?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">New Post</h1>
                    <?php
                    if(count($_POST)>0){
                        //Process info
                        appendJsonArraytoFile("../data/discPosts.json");
                        header('location: discussion_board.php');

                    } else {
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
                        <p>Topic: </p>
                        <select name="Category">
                            <option value="connect">Career Connections</option>
                            <option value="celebrate">Celebrations</option>
                            <option value="strat">Interview Strategies</option>
                        </select>
                        <p>Title:</p>
                        <input size="50" type="text" name="PostTitle" required></input><br>
                        </br>
                        <p>Post Description:</p>
                        <textarea rows="20" cols="100" name="PostBody" required></textarea><br>
                        </br>
                        <button type="submit">Post</button>
                    </form>
                    <?php
                    } ?>
                    <a href="discussion_board.php">Back to Topics</a>
                    
                    <!--Discussion board like canvas? doesn't have to have user auth-->
                    <!--description here-->
                    <!--reply box-->
                    <!--list of replies that can be replied to (replies to topic replies are shown in an indented dropdown)-->
                </div>
            </div>
        </header>
  
  
        <?php
        require_once('../theme/footer.php');
        ?>
    </body>
</html>