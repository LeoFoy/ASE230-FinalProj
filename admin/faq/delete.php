<?php
	$output = '';
	$fp = fopen('../../data/faq.csv', 'r');
	$index = 0;
	while(!feof($fp)){
		$line = fgets($fp);
		if($index!=$_GET['index']){
			$output.=$line;
		}
		$index++;
	}
	fclose($fp);
	$fp = fopen('../../data/faq.csv', 'w');
	fputs($fp, $output);
	fclose($fp);
	header('location: index.php');
	
?>