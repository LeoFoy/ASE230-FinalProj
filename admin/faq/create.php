<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$faqArray = csvFiletoArrayWithTwoIndexes('../../data/faq.csv');

if(count($_POST)>0){
	$fp = fopen('../../data/faq.csv', 'a+');
	fwrite($fp, $_POST['question'].';'.$_POST['answer'].PHP_EOL);
	fclose($fp);
	header('location: index.php');
}
else { ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	<h1>Create a FAQ entry</h1>
	Question: <textarea name="question" required></textarea>
	Answer: <textarea name="answer" required></textarea>
	<button type="submit">Create FAQ Entry</button>
</form>
<?php } ?>
<a href="index.php">go back to index</a>