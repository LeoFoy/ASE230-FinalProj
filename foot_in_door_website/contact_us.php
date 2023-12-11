<?php
require_once('../lib/functions.php');
require_once("../data/contacts.php");
?>

<?php
require_once('../theme/header.php');
?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Have Questions? Feel free to contact us!</h1>
                </div>
            </div>
        </header>

<?php foreach($contacts as $name) { ?>
	<h4><?=$name['name'].""?></h4>
	<img class="picture" src=<?=$name['picture'].""?> alt="" width="150" height="150">
	<p><?=$name['email'].""?> <br> <?=$name['phone'].""?></p>
	<br>
<?php } ?>

<?php
require_once('../theme/footer.php');
?>
	</body>
</html>
