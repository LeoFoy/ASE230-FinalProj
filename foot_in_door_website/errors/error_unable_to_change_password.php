<?php
require_once('../../theme/errorHeader.php');
?>
<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1>Current password is not correct, unable to change password</h1>
                    <a href="../user_profile.php">Go back to profile</a><br />
                    <button class="lead fw-normal text-white-50 mb-0"><a style="text-decoration:none" href="../../foot_in_door_website/index.php">Go back to home page</a></button>
                </div>
            </div>
        </header>
        <?php
            require_once('../../theme/errorFooter.php');
        ?>
    </body>
</html>