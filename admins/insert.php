<?php

session_name("login");
session_start();

include_once __DIR__ . "/inc/database.php";

try {
    $db = new PDO(
        "mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charsert=utf8;",
        Database::DBUSER,
        Database::DBPASS,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $pe) {
    echo $pe->getMessage();
}

$titreError = $infoError = $liensError = $filtercardError = $imagesError = $titre = $info = $liens = $filtercard = $images = "";

if(!empty($_POST)) {
    $titre              = checkInput($_POST['titre']);
    $info               = checkInput($_POST['info']);
    $liens              = checkInput($_POST['liens']);
    $filtercard         = checkInput($_POST['filtercard']);
    $images             = checkInput($_FILES["images"]["name"]);
    $imagePath          = '../assets/img/portfolio/'. basename($images);
    $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
    $isSuccess          = true;
    $isUploadSuccess    = false;

    if(empty($titre)) {
        $titreError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($info)) {
        $infoError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($liens)) {
        $liensError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($filtercard)) {
        $filtercardError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($images)) {
        $imagesError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    else {
        $isUploadSuccess = true;
        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) {
            $imagesError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if(file_exists($imagePath)) {
            $imagesError = "Le fichier existe deja";
            $isUploadSuccess = false;
        }
        if($_FILES["images"]["size"] > 500000) {
            $imagesError = "Le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess) {
            if(!move_uploaded_file($_FILES["images"]["tmp_name"], $imagePath)) {
                $imagesError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    if($isSuccess && $isUploadSuccess) {
        $statement = $db->prepare("INSERT INTO cartes (titre,info,liens,filtercard,images) values(?, ?, ?, ?, ?)");
        $statement->execute(array($titre,$info,$liens,$filtercard,$images));

        header("Location: index.php");
    }
}

function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Burger Code</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
<h1 class="text-logo text-center"><span class="bi bi-laptop"></span> Web Concept Site <span class="bi bi-laptop"></span></h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Ajouter un nouveau site</strong></h1>
        <br>
        <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
            <br>
            <div>
                <label class="form-label" for="titre">Titre:</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" value="<?php echo $titre;?>">
                <span class="help-inline"><?php echo $titreError;?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="info">Description:</label>
                <input type="text" class="form-control" id="info" name="info" placeholder="info" value="<?php echo $info;?>">
                <span class="help-inline"><?php echo $info;?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="liens">Liens</label>
                <input type="text" class="form-control" id="liens" name="liens" placeholder="liens" value="<?php echo $liens;?>">
                <span class="help-inline"><?php echo $liensError;?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="filtercard">Filtre de carte</label>
                <input type="text"  class="form-control" id="filtercard" name="filtercard" placeholder="filtre" value="<?php echo $filtercard;?>">
                <span class="help-inline"><?php echo $filtercardError;?></span>
            </div>
            <br>
            <div>
                <label class="form-label" for="images">Sélectionner une image:</label>
                <input type="file" id="images" name="images">
                <span class="help-inline"><?php echo $imagesError;?></span>
            </div>
            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Ajouter</button>
                <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>

            </div>
        </form>
    </div>
</div>
</body>
</html>