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

/*===============================================*/
/*============== Auhtentification ===============*/
include_once __DIR__ . "/functions.php";

$erreur = false;
$login = " ";

if (isset($_POST) && !empty($_POST)) {

    $login = validateForm($_POST["login"]);
    $password = trim($_POST["password"]);
    /*============== pot de miel ===============*/
    if (strpos($login, "&gt;") > 0) {
        header("location: honney.php");
    }

    $admin = signIn($login, $password);
    if (!empty($admin)) {
        if ($admin["id"] > 0) {
            $_SESSION["login"] = $admin["login"];
            header("Location: index.php");
        } else {
            $erreur = true;
        }
    } else {
        $erreur = true;
    }
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebConceptSite Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Connexion</h1>
   <?php echo password_hash("test", PASSWORD_DEFAULT); ?>
    <!--==================== FORMULAIRE LOGIN ADMIN  =======================-->
    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mb-3">Administration</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="" id="form" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>Login<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-user-shield"></i></div>
                                                <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Mot de passe<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="****">
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">Soumettre</button>
                                        </div>
                                        <?php if ($erreur) { ?>
                                            <div class="alert alert-danger">
                                                <h6 class="alert-title">Erreur</h6>
                                                <p>Impossible de vous connecter</p>
                                                <hr>
                                                <pre>Veuillez vérifier vos saisies</pre>
                                            </div>

                                        <?php } ?>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 text-center pt-5 bg-primary p-2 text-dark bg-opacity-25">

                                    <img src="../assets/img/logoweb.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-end text-secondary mt-3">Web-Concept-Site Login Page Design</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>