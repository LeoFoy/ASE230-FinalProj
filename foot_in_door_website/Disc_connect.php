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
                    <h1 class="display-4 fw-bolder">Career Connections</h1>
                    <?php
                        $array_json = jsonFiletoArray("../data/discPosts.json");
                    ?>
                    <button><a href="createPost.php">Create Post</a></button>
                    <hr>
                    <?php 
                        for($i=0; $i<count($array_json); $i++) 
                        { ?>
                            <?php if ($array_json[$i]['Category'] == "connect") {?>
                                <a href="postDetail.php?index=<?php echo $i; ?>"><p><?php echo $array_json[$i]['PostTitle']; ?></p></a>
                                <hr>
                            <?php }?>
                    <?php } ?>

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