<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$faqArray = csvFiletoArrayWithTwoIndexes('../../data/faq.csv');
?>
<h1>FAQ index: </h1>
<a href="create.php"><b>Create A New FAQ</b></a>
<?php
$index = 0;
foreach($faqArray as $faq){ ?>
		<div>
		<h2>Question <?=$index+1; echo ': ';?><?= $faq[0]; ?></h2>
		<a href="detail.php?index=<?= $index; ?>">See details</a>
		<?php $index++; ?>
		<hr />
	</div>
<?php } ?>