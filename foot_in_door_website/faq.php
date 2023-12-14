<?php
    require_once('../lib/csvFunc.php');
    $faqArray = csvFiletoArrayWithTwoIndexes('../data/faq.csv');
?>

<?php
require_once('../theme/header.php');
?>
		<!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Frequently Asked Questions</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Have Questions? We're here to help!</p>
                </div>
            </div>
        </header>
		
		<ul>
		
			<?php 
			if(!empty($faqArray)){
				for($i=0; $i < count($faqArray); $i++){ ?>
				<li><b>Question <?php echo $i+1; echo ': </b>';?><?=$faqArray[$i][0]; ?></li>
				<p>Answer: <?=$faqArray[$i][1]; ?></p>
			<?php } }?>

		</ul>
		
		<p>None of these questions help?</p>
		<a href="../pages/contact_us.php">Contact Us</a></li>

        <?php
        require_once('../theme/footer.php');
        ?>
	</body>
</html>
