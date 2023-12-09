<?php
	$output = '';
	$fp = fopen('../../data/tips.csv', 'r');
	$index = 0;
	while(!feof($fp)){
		$line = fgets($fp);
		if($index!=$_GET['index']){
			$output.=$line;
		}
		$index++;
	}
	fclose($fp);
	$fp = fopen('../../data/tips.csv', 'w');
	fputs($fp, $output);
	fclose($fp);
	header('location: index.php');
	
?>
