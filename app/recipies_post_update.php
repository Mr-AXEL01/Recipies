<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
//require_once(__DIR__ . '/databaseConnect.php');
require_once (__DIR__ . '/variables.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (
    !isset($postData['id'])
    || !is_numeric($postData['id'])
    || empty($postData['title'])
    || empty($postData['recipy'])
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['recipy'])) === ''
) {
    echo 'Il manque des informations pour permettre l\'édition du formulaire.';
    return;
}

$id = (int)$postData['id'];
$title = trim(strip_tags($postData['title']));
$recipy = trim(strip_tags($postData['recipy']));

$insertRecipeStatement = $dbh->prepare('UPDATE recipy SET title = :title, recipy = :recipy WHERE recipyID = :id');
$insertRecipeStatement->execute([
    'title' => $title,
    'recipy' => $recipy,
    'id' => $id,
]) or die(print_r($dbh->errorInfo()));

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container">

    <?php require_once(__DIR__ . '/header.php'); ?>
    <h1>Recette modifiée avec succès !</h1>

    <div class="card">

        <div class="card-body">
            <h5 class="card-title"><?php echo($title); ?></h5>
            <p class="card-text"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
            <p class="card-text"><b>Recette</b> : <?php echo $recipy; ?></p>
        </div>
    </div>
</div>
<?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>