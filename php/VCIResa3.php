<?php require "head.php"; 
require_once "config.php";
require_once "database.php";
$recupfilm = $_GET["film"];
$recuptypefilm = $_GET["typeF"];
$cnx1=connectDb();
$requete_infofilm = "SELECT ID_FILM, REF_IMAGE, TITRE_FILM, ANNEE_FILM, CODE_TYPE_FILM FROM `film` WHERE ID_FILM = '$recupfilm' ";
$reponse_infofilm  = $cnx1->prepare($requete_infofilm);
$reponse_infofilm ->execute();
$donnees_infofilm  = $reponse_infofilm->fetch();
$recupfilm2 = $donnees_infofilm["TITRE_FILM"];
?>
<main>
    <H1>Voici le film que vous avez sélectionnez</h1>
    <div class="row justify-content-center">
        <div class="col-auto">
            <table class="table table-striped table-dark">
                <tr>
                    <th><?php 
                if($recuptypefilm == "ACT")
                {
                echo "<img src=../pictures/FilmMiniatures/Action/". $donnees_infofilm["REF_IMAGE"]. ">";
                }
                else if($recuptypefilm == "COM")
                {
                echo "<img src=../pictures/FilmMiniatures/Comedie/". $donnees_infofilm["REF_IMAGE"]. ">";
                }
                else if($recuptypefilm == "ANI")
                {
                echo "<img src=../pictures/FilmMiniatures/Animation/". $donnees_infofilm["REF_IMAGE"]. ">";
                }
                else if($recuptypefilm == "HOR")
                {
                echo "<img src=../pictures/FilmMiniatures/Horreur/". $donnees_infofilm["REF_IMAGE"]. ">";
                }
                $test = $donnees_infofilm["TITRE_FILM"];
                ?>
                    </th>
                    <th>
                        <p>Titre : <?php echo($donnees_infofilm["TITRE_FILM"]);?>
                        </p>
                        <p>Année : <?php echo($donnees_infofilm["ANNEE_FILM"]);?>
                        </p>
                        <?php
                    $requete_infofilm2 = "SELECT * FROM star INNER JOIN film ON film.ID_REALIS = star.ID_STAR WHERE TITRE_FILM = '$test'";
                    $reponse_infofilm2  = $cnx1->prepare($requete_infofilm2);
                    $reponse_infofilm2 ->execute();
                    $donnees_infofilm2  = $reponse_infofilm2->fetch();
                    ?>
                        <p>Réalisateur :
                            <?php echo($donnees_infofilm2["NOM_STAR"]. " " . $donnees_infofilm2["PRENOM_STAR"]);?>
                        </p>
                    </th>
                </tr>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <form action="VCIResa4.php?film=<?=$recupfilm2?>&id=<?=$recupfilm?>" method="post" name="ValidationAdherent">
            <h3>Veuillez saisir vos coordonnées:</h3>

            <label>Nom : </label>
            <input name="nomADHERENT" type="text"></input>
            </br>
            <label>N Adhérent : </label>
            <input name="noADHERENT" type="text"></input>
            </br>
            <input class="bn632-hover bn26" type="submit" value="Réservez" name="Reservation"></input>
            <button class="bn632-hover bn26" type="button" onclick="history.go(-1)">Annulez</button>
    </div>
    </form>
</main>
<?php require "pied.php";?>