<?php
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseConnect.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('La recette n\'existe pas');
    return;
}

// On récupère la recette
$retrieveRecipeStatement = $dbh->prepare('SELECT r.* FROM recipy r WHERE r.recipyID = :id ');
$retrieveRecipeStatement->execute([
    'id' => (int)$getData['id'],
]);
$recipy = $retrieveRecipeStatement->fetch();

if (!$recipy) {
    echo('La recette n\'existe pas');
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - <?php echo($recipy['title']); ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container">

    <?php require_once(__DIR__ . '/header.php'); ?>
    <h1><?php echo($recipy['title']); ?></h1>
    <div class="row">
        <article class="col">
            <?php echo($recipy['recipy']); ?>
        </article>
        <aside class="col">
            <p><i>Contribuée par <?php echo($recipy['author']); ?></i></p>
        </aside>
    </div>
</div>
<?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>