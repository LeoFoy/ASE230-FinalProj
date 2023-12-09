<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');

$usersArray = csvFiletoArrayWithFourIndexes('../../data/users.csv.php');
?>
<h1>User</h1>
<h3>Username: <?= $usersArray[$_GET['index']][0]; ?><h3>
<h3>Email: <?= $usersArray[$_GET['index']][1]; ?><h3>
<h3>Phone-number: <?= $usersArray[$_GET['index']][2]; ?><h3>
<a href='index.php'>Go back to user index</a><br />
<a href='edit.php?index=<?php echo $_GET['index'];?>'>Edit this User</a><br />
<a href='delete.php?index=<?php echo $_GET['index'];?>'>Delete this User</a>
