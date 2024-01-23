<?php
require_once 'databaseConnect.php';
$dbh = dbConnection();
$userStatement = $dbh->prepare('SELECT * FROM user');
$userStatement->execute();
$users = $userStatement->fetchAll();

$recipyStatement = $dbh->prepare('SELECT * FROM recipy WHERE isEnabled = "1"');
$recipyStatement->execute();
$recipies = $recipyStatement->fetchAll();

