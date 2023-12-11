<?php
require_once('../lib/functions.php');
require_once('../lib/csvFunc.php');

$tipsArray = csvFiletoArrayWithOneIndexes('../data/tips.csv');

?>

<?php
require_once('../theme/header.php');
?>
		<!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Important Tips</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Make sure to include these on your resume!</p>
                </div>
            </div>
        </header>
		
		<ul>
			<?php
			if(!empty($tipsArray)){
				for($i=0; $i < count($tipsArray); $i++){ ?>
				<li><b>Tip <?php echo $i+1; echo ': </b>';?><?=$tipsArray[$i][0]; ?></li>
			<?php } }?>
		</ul>
		
		<h2>Examples of Quality Resumes</h2>
		<img class="picture" src="../foot_in_door_website/assets/resume1.png" alt="image1" width="750" height="1000">
		<img class="picture" src="../foot_in_door_website/assets/resume2.png" alt="image2" width="750" height="1000">
		<img class="picture" src="../foot_in_door_website/assets/resume3.jpg" alt="image3" width="750" height="1000">
		<img class="picture" src="../foot_in_door_website/assets/resume4.png" alt="image4" width="750" height="1000">

        <?php
        require_once('../theme/footer.php');
        ?>
	</body>
</html>
