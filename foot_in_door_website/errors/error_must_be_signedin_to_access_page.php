<?php
require_once('../../theme/errorHeader.php');
?>
<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1>Must be signed in to access this page!</h1>
                    <button class="lead fw-normal text-white-50 mb-0"><a style="text-decoration:none" href="../login.php">Sign In</a></button>
                    <button class="lead fw-normal text-white-50 mb-0"><a style="text-decoration:none" href="../signup.php">Sign up</a></button>
                    <button class="lead fw-normal text-white-50 mb-0"><a style="text-decoration:none" href="../../foot_in_door_website/index.php">Go back to home page</a></button>
                </div>
            </div>
        </header>
        <?php
            require_once('../../theme/errorFooter.php');
        ?>
    </body>
</html>