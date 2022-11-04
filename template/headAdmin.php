<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="../js/java.js"></script>
    <link href="../controleurs/assets/css/formConnexion.css" rel="stylesheet">
    <link href="../controleurs/assets/css/effets.css" rel="stylesheet">
    <link href="../controleurs/assets/css/VCIMenu.css" rel="stylesheet">
    <title><?= $title?></title>
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-md">
            <div class="container-fluid containerNav">
                <a href="../controleurs/VCIAccueil_controleur.php" class="navbar-brand">
                    <img id="logoA" src="../controleurs/assets/pictures/DesignVideoClub/VCLogo.gif" width="45" alt="LogoAccueil">
                    <span class="sign">
                        <span class="fast-flicker">V</span>ideo-<span class="flicker">Cl</span>ub
                    </span>
                </a>
                <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around"
                    type="button" data-bs-toggle="collapse" data-bs-target="#n_bar" aria-controls="n_bar"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon top-bar"></span>
                    <span class="toggler-icon middle-bar"></span>
                    <span class="toggler-icon bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="n_bar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link"
                                href="../controleurs/VCINewFilm_controleur.php">Ajouter/Supprimer un film</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="../controleurs/VCINewAdh_controleur.php">Ajouter/Supprimer un adhérent</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="../controleurs/VCILocation_controleur.php">Location en cours</a></li>
                        <form method="post" action="">
                            <li id="Dcnx2" class="nav-item"><input type="submit" id="btnDeconnexion" name="disconnectBtn"
                                    class="bn632-hover bn26" value="Deconnexion"></li>
                        </form>
                    </ul>
                </div>
                <div id="Dcnx">
                    <form method="post" action="">
                        <input type="submit" id="btnDeconnexion" name="disconnectBtn" class="bn632-hover bn26 btnConnexion"
                            value="Deconnexion">
                    </form>
                </div>
                <?php
                if(isset($_POST["disconnectBtn"]))
                {
                    session_unset();
                    session_destroy();
                    header("Location: VCIAccueil_controleur.php");
                }
                ?>
            </div>
            </nav>
            <hr class="hrNav">
    </header>
    <main>
        <p class="d-flex flex-row" id=date1></p>
        <a href="../controleurs/VCIMenuAdmin_controleur.php"><h5  id="backAdm" class="d-flex flex-row">< Retour accueil admin</h5></a>