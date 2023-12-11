<?php
require_once('../../settings.php');

$dsn="mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES => false
];

$pdo=new PDO($dsn, $discussion_board, $pass, $opt);

function query($pdo,$query,$data=[]) {
	$query=$pdo->prepare($query);
	$query->execute($data);
	return $query;
}
