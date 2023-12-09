<?php

function csvFiletoArrayWithOneIndexes($path){
	$csvArray = [];
	$fp = fopen($path, 'r');
		while (!feof($fp)){
			$line = fgets($fp);
			if(strlen($line) < 5) continue;
				array_push($csvArray, [$line]);
		
		}
		fclose($fp);	
		return $csvArray;
}

function csvFiletoArrayWithTwoIndexes($path){
	$csvArray = [];
	$fp = fopen($path, 'r');
		while (!feof($fp)){
			$line = fgets($fp);
			if(strlen($line) < 5) continue;
				$line = explode(';', trim($line));
				array_push($csvArray, [$line[0], $line[1]]);
		
		}
		fclose($fp);	
		return $csvArray;
}

function csvFiletoArrayWithThreeIndexes($path){
	$csvArray = [];
	$fp = fopen($path, 'r');
		while (!feof($fp)){
			$line = fgets($fp);
			if(strlen($line) < 5) continue;
				$line = explode(';', trim($line));
				array_push($csvArray, [$line[0], $line[1], $line[2]]);
		
		}
		fclose($fp);	
		return $csvArray;
}

//BE AWARE:
//this function explodes a line with a ',' instead of a ';' like the previous functions ^
//this is because this is how the users.csv.php file is set up.
function csvFiletoArrayWithFourIndexes($path){
	$csvArray = [];
	$fp = fopen($path, 'r');
		while (!feof($fp)){
			$line = fgets($fp);
			if(strstr($line, '<?php die() ?>') || strlen($line) < 5) continue;
				$line = explode(',', trim($line));
				array_push($csvArray, [$line[0], $line[1], $line[2], $line[3]]);
		
		}
		fclose($fp);	
		return $csvArray;
}

?>
