<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$faqArray = csvFiletoArrayWithTwoIndexes('../../data/faq.csv');
$entry = $faqArray[$_GET['index']];

if (count($_POST)>0){
	$output = '';
	$fp = fopen('../../data/faq.csv','r');
	$index = 0;
	while(!feof($fp)){
		$line = fgets($fp);
		if($index==$_GET['index']){
			//modify line
			$output.=$_POST['question'].';'.$_POST['answer'].PHP_EOL;
		} else{
			//put line into output
			$output.=$line;
		}
		$index++;
		$question_number++;
	}
	fclose($fp);
	$fp = fopen('../../data/faq.csv','w');
	fputs($fp, $output);
	fclose($fp);
	header('location: index.php');
	
}else {?>
<form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST">
	<h1>Update FAQ Entry</h1>
	Question: <input type='text' name="question" value="<?= $entry[0] ?>" required></input>
	Answer: <input type='text' name="answer" value="<?= $entry[1] ?>" required></input>
	<button type="submit">Update FAQ entry</button>
</form>
<?php
} ?>





