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
                    <h1 class="display-4 fw-bolder">Welcome to the Discussion Board!</h1>
                    <h3 class="display-4 fw-bolder"> Topics:</h3><br />
					<p><a href="Disc_connect.php" class="btn btn-primary mb-3">Career Connections</a></p>
					<p><a href="Disc_strat.php" class="btn btn-primary mb-3">Interview Strategies</a></p>
					<p><a href="Disc_celebrate.php" class="btn btn-primary mb-3">Celebration</a></p><br /><br />
					<p><a href="discussion_board/index.php" class="btn btn-primary mb-3">View All Discussion Posts!</a></p><br /><br />
                </div>
            </div>
        </header>
  
  
        <?php
        require_once('../theme/footer.php');
        ?>
    </body>
</html>
