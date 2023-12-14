<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$tipsArray = csvFiletoArrayWithOneIndexes('../../data/tips.csv');
?>
<h1>Tip index: </h1>
<a href="create.php"><b>Create A New Tip</b></a>
<?php
$index = 0;
foreach($tipsArray as $tip){ ?>
		<div>
		<h2>Tip <?=$index+1; echo ': ';?><?= $tip[0]; ?></h2>
		<a href="detail.php?index=<?= $index; ?>">See details</a>
		<?php $index++; ?>
		<hr />
	</div>
<?php } ?>
