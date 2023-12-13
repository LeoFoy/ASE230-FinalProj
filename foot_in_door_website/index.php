<?php
require_once('../settings.php');
?>

<?php
require_once('../theme/header.php');
?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Create Your Dream Resume Today!</h1>
                    <button class="lead fw-normal text-white-50 mb-0"><a style="text-decoration:none" href="../pages/create_resume.php">Create Resume Now</a></button>
                </div>
            </div>
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tips and Examples</h1>
			        <button class="lead fw-normal text-white-50 mb-0"><a style="text-decoration:none" href="../pages/tips.php">See Quality Examples</a></button>
                </div>
            </div>
        </header>
        <?php
            require_once('../theme/footer.php');
        ?>
    </body>
</html>
