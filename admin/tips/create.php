<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$tipArray = csvFiletoArrayWithOneIndexes('../../data/tips.csv');

if(count($_POST)>0){
	$fp = fopen('../../data/tips.csv', 'a+');
	fwrite($fp, $_POST['tip'].PHP_EOL);
	fclose($fp);
	header('location: index.php');
}
else { ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	<h1>Create a tip entry</h1>
	tip: <textarea name="tip" required></textarea>
	<button type="submit">Create Tip Entry</button>
</form>
<?php } ?>
<a href="index.php">go back to index</a>
