<?php require "head.php"; 
require_once "config.php";
require_once "database.php";
$recupfilm = $_GET["film"];
$recuptypefilm = $_GET["typeF"];
$cnx1=connectDb();
$requete_infofilm = "SELECT REF_IMAGE, TITRE_FILM, ANNEE_FILM, CODE_TYPE_FILM FROM `film` WHERE ID_FILM = '$recupfilm' ";
$reponse_infofilm  = $cnx1->prepare($requete_infofilm);
$reponse_infofilm ->execute();
$donnees_infofilm  = $reponse_infofilm->fetch();
?>
<main>
    <H1>Voici le film que vous avez sélectionnez</h1>
        <table id="CF">
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
                ?>
                </th>
                <th>
                    <p>Titre : <?php echo($donnees_infofilm["TITRE_FILM"]);?>
                    </p>
                    <p>Année : <?php echo($donnees_infofilm["ANNEE_FILM"]);?>
                    </p>
                    <?php
                    $requete_infofilm2 = "SELECT NOM_STAR, PRENOM_STAR FROM star JOIN film ON film.ID_REALIS = star.ID_STAR WHERE CODE_TYPE_FILM = '$recuptypefilm'";
                    $reponse_infofilm2  = $cnx1->prepare($requete_infofilm2);
                    $reponse_infofilm2 ->execute();
                    $donnees_infofilm2  = $reponse_infofilm2->fetch();
                    ?>
                    <p>Réalisateur : <?php echo($donnees_infofilm2["NOM_STAR"]. " " . $donnees_infofilm2["PRENOM_STAR"]);?></p>
                </th>
            </tr>
        </table>
    <form style=" text-align: center;" action="VCIResa4.php" method="post" name="ValidationAdherent">
        <h3>Veuillez saisir vos coordonnées:</h3>
        <div class="IDRES">
                <label>Nom : </label>
                <input name="" class="IDRES" type="text"></input>
        </div>
        <div class="IDRES">
                <label>N Adhérent : </label>
                <input name="noADHERENT" class="IDRES" type="text"></input>
        </div>
        <input type="submit" value="Réservez" name="Reservation"></input>
        <button type="button" >Annulez</button>
    </form>
</main>