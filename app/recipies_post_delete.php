<?php

session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
//require_once(__DIR__ . '/databaseConnect.php');
require_once (__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (!isset($postData['id']) || !is_numeric($postData['id'])) {
    echo 'Il faut un identifiant valide pour supprimer une recette.';
    return;
}

$deleteRecipeStatement = $dbh->prepare('DELETE FROM recipy WHERE recipyID = :id');
$deleteRecipeStatement->execute([
    'id' => (int)$postData['id'],
]) or die(print_r($dbh->errorInfo()));

redirectToUrl('index.php');