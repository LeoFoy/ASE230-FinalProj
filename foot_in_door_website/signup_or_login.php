<?php
require_once('../lib/functions.php');
?>

<?php
require_once('../theme/header.php');
?>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">New To Foot In The Door?</h1>
                    <p class="lead fw-normal text-white-50 mb-0">If So</p>
                    <button class="lead fw-normal text-white-50 mb-0"> <a style="text-decoration:none" href="signup.php">Sign Up Now!</a></button>
                </div>
            </div>
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <p class="lead fw-normal text-white-50 mb-0">If Not</p>
                    <button class="lead fw-normal text-white-50 mb-0"> <a style="text-decoration:none" href="login.php">Log In</a></button>
                </div>
            </div>
        </header>

        <?php
        require_once('../theme/footer.php');
        ?>
	</body>
</html>
