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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../js/java.js"></script>
    <script type="text/javascript" src="../js/catalogue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../controleurs/assets/css/formConnexion.css" rel="stylesheet">
    <link href="../controleurs/assets/css/effets.css" rel="stylesheet">
    <link href="../controleurs/assets/css/VCIMenu.css" rel="stylesheet">
    <title><?=$title?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-md">
            <div class="container-fluid containerNav">
                <a href="../controleurs/VCIAccueil_controleur.php" class="navbar-brand">
                    <img id="logoA" src="../controleurs/assets/pictures/DesignVideoClub/VCLogo.gif" width="50" alt="LogoAccueil">
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
                        <li class="nav-item"><a class="nav-link" href="../controleurs/VCIResa_controleur.php">Reservez
                                un film</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="../controleurs/VCICatalogue_controleur.php">Catalogue</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../controleurs/VCIContact_controleur.php">Contact</a>
                        </li>
                        <?php
                        if(!isset($_SESSION["role"])){
                            $_SESSION["role"] = "none";
                        }
                        if($_SESSION["role"]  == "admin"){
                        ?>
                        <form method="post" action="VCIMenuAdmin_controleur.php">
                            <li id="Dcnx2" class="nav-item"><input type="submit" id="btnDeconnexion" name="btnAdminP"
                                    class="bn632-hover bn26" value="Panel Admin"></li>
                        </form>
                        <?php
                        }
                        else{
                        ?>
                        <li id="Admin2" class="nav-item"><button type="button" id="btnAdmin"
                                class="bn632-hover bn26">Connexion</button></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
                if($_SESSION["role"]  == "admin"){
                ?>
                <div id="Dcnx">
                    <form method="post" action="VCIMenuAdmin_controleur.php">
                        <input type="submit" id="btnPanelAdmin" name="btnAdminP" class="bn632-hover bn26"
                            value="Panel Admin">
                    </form>
                </div>
                <?php
                }
                else{
                ?>
                <div id="Admin">
                    <button type="button" class="bn632-hover bn26">Connexion</button>
                </div>
                <?php
                }
                ?>
            </div>
        </nav>
        <hr class="hrNav">
    </header>
    <main>
        <p class="d-flex flex-row" id=date1></p>


        <div id="sous-Admin" class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <div class="card-wrap mx-auto">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h3>Connexion</h3>
                                            <form method="post" action="../src/VCIAdmin.php">
                                                <div class="form-group">
                                                    <input type="text" name="Nom_Admin" class="form-style"
                                                        placeholder="Identifiant" id="logID" autocomplete="off">
                                                    <i id="iconID" class="input-icon fa-solid fa-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="Pass_Admin" class="form-style"
                                                        placeholder="Mot de passe" id="logPASS" autocomplete="off">
                                                    <i id="iconPASS" class="input-icon fa-solid fa-lock"></i>
                                                </div>
                                                <button type="submit" class="bn632-hover bn26">Connexion</button>
                                                <button type="button" id="btnRetourCnx"
                                                    class="bn632-hover bn26">Retour</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>