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
                    <?php
                        $array_json = jsonFiletoArray("../data/discPosts.json");
                    ?>
                    <?php if ($array_json[$_GET['index']]['Category'] == "connect") {?>
                        <h1 class="display-4 fw-bolder">Career Connections</h1>
                    <?php }?>
                    <?php if ($array_json[$_GET['index']]['Category'] == "strat") {?>
                        <h1 class="display-4 fw-bolder">Interview Strategies</h1>
                    <?php }?>
                    <?php if ($array_json[$_GET['index']]['Category'] == "celebrate") {?>
                        <h1 class="display-4 fw-bolder">Celebration</h1>
                    <?php }?>
                    
                    <h4><?php echo $array_json[$_GET['index']]['PostTitle']; ?></h4>
                    <p><?php echo $array_json[$_GET['index']]['PostBody']; ?></p>
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