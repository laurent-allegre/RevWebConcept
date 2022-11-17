<?php


session_name("login");
session_start();

if(!empty($_SESSION) && isset($_SESSION["login"])) {

include_once __DIR__ . "/inc/database.php";

try{
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
}catch(PDOException $pe){
    echo $pe->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Prestance Autos le concessionnaire de véhicules de luxe à Monteux">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>WebConceptSite</title>
</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div id="logo">
            <h1><a href="index.php">WebConcept<span>Site</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.php"><img src="assets/img/logo.png" alt=""></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
                <li><a class="nav-link scrollto" href="#about">Présentation</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="./admins/login.php">connexion</a></li>

                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!--==================== LISTE DES VEHICULES=======================-->
<div class="container admin mt-5">
    <div class="row table-responsive">
        <h2><strong>Liste des Sites :</strong><a href="insert.php" type="button" class="btn btn-success btn-sm ms-3"><span class="fas fa-plus"></span> Ajouter</a><a href="../index.php" type="button" class="btn btn-primary btn-sm ms-1"><span class="fas fa-arrow-left"></span> retour </a><a href="logout.php" type="button" class="btn btn-danger btn-sm ms-1"><span class="fas fa-exclamation-triangle"></span> Déconnexion </a></h2>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Titre</th>
                <th>info</th>
                <th>Liens</th>
                <th>Images</th>
                <th>Filtre</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $statement = $db->query('SELECT cartes.id, cartes.titre, cartes.info, cartes.liens, cartes.images, cartes.filtercard
                                             FROM cartes ORDER BY cartes.id DESC');
            while($item = $statement->fetch())
            {
                echo '<tr>';
                echo '<td>' . $item['titre'] . '</td>';
                echo '<td>' . $item['info'] . '</td>';
                echo '<td>' . $item['liens'] . '</td>';
                echo '<td>' . $item['images'] . '</td>';
                echo '<td>' . $item['filtercard'] . '</td>';


                echo '<td class="action">';
                echo '<a type="button"class="btn btn-outline-secondary btn-sm" href="view.php?id=' . $item['id'] .'"><span class="fas fa-eye"></span>  voir</a>';
                echo ' ';
                echo '<a type="button"class="btn btn-primary btn-sm" href="update.php?id=' . $item['id'] .'"><span class="fas fa-edit"></span>  Modifier</a>';
                echo ' ';
                echo '<a type="button"class="btn btn-danger btn-sm" href="delete.php?id=' . $item['id'] .'"><span class="fas fa-edit"></span>  Supprimer</a>';

                echo '</td>';
                echo '</tr>';

            }

            ?>


            </tbody>
        </table>
    </div>
</div>




<!-- SI ON EST PAS CONNECTER ON AFFICHE LA PAGE D'ACCUEIL -->
<?php } else {
    header("location: ./");
} ?>

</body>
</html>