<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$faqArray = csvFiletoArrayWithTwoIndexes('../../data/faq.csv');
?>
<h1>Question <?php echo $_GET['index'] + 1; ?><h1>
<h3><b>Question: </b><?= $faqArray[$_GET['index']][0]; ?><h3>
<h3><b>Answer: </b><?= $faqArray[$_GET['index']][1]; ?><h3>
<a href='index.php'>Go back to index</a><br />
<a href='edit.php?index=<?php echo $_GET['index'];?>'>Edit this FAQ entry</a><br />
<a href='delete.php?index=<?php echo $_GET['index'];?>'>Delete this FAQ entry</a>