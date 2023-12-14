<?php
require_once('../../lib/functions.php');
require_once('../../lib/csvFunc.php');
require_once('../../lib/db.php');

$usersArray = csvFiletoArrayWithFourIndexes('../../data/users.csv.php');
?>
<h1>Users index: </h1>
<a href="create.php"><b>Create A New User</b></a>
<?php
$index = 0;
foreach($usersArray as $user){ ?>
		<div>
		<h2>User <?=$index+1; echo ': ';?><?= $user[0]; ?></h2>
		<a href="detail.php?index=<?= $index; ?>">See details</a>
		<?php $index++; ?>
		<hr />
	</div>
<?php } ?>
