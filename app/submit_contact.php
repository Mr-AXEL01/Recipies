<?php
if (!isset($_POST['email']) || !isset($_POST['message'])){
    echo 'Il faut un email et un message pour soumettre le formulaire.';

    return;
}
if(isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
    if($_FILES['screenshot']['size']<=1000000) {
        $fileInfo = pathinfo($_FILES['screenshot']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg' , 'png' , 'gif' , 'jpeg'];
        if(in_array($extension,$allowedExtensions)){
            move_uploaded_file($_FILES['screenshot']['tmp_name'], 'uploads/' . basename($_FILES['screenshot']['name']));
            echo "L'envoi a bien éTé effecuté !";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>submit contact form</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
    <div class="container">
        <?php include_once('header.php'); ?>
        <h1>Message bien reçu !</h1>  
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo $_POST['email']; ?></p>
                <p class="card-text"><b>Message</b> : <?php echo strip_tags($_POST['message']); ?></p>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>
</html>
