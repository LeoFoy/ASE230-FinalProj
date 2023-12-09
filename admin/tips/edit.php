<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$tipsArray = csvFiletoArrayWithOneIndexes('../../data/tips.csv');
$entry = $tipsArray[$_GET['index']];

if (count($_POST)>0){
	$output = '';
	$fp = fopen('../../data/tips.csv','r');
	$index = 0;
	while(!feof($fp)){
		$line = fgets($fp);
		if($index==$_GET['index']){
			//modify line
			$output.=$_POST['tip'].PHP_EOL;
		} else{
			//put line into output
			$output.=$line;
		}
		$index++;
	}
	fclose($fp);
	$fp = fopen('../../data/tips.csv','w');
	fputs($fp, $output);
	fclose($fp);
	header('location: index.php');
	
}else {?>
<form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST">
	<h1>Update Tip Entry</h1>
	Tip: <input type='text' name="tip" value="<?= $entry[0] ?>" required></input>
	<button type="submit">Update FAQ entry</button>
</form>
<?php
} ?>
