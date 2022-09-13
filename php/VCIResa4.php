<?php require "head.php"; 
require_once "config.php";
require_once "database.php";
$cnx1=connectDb();
?>
<main>
    <h1>Réservation de film</h1>
<form method="post">
<input type="submit" name="buttonRetour" style="display: block;margin: 0 auto;"
                 value="retour au menu"/> 
</form>
<?php
$num_AD = $_POST["noADHERENT"];
$requete_adherent = "SELECT * from adherent WHERE NUM_ADHERENT=?";
$reponse_adherent  = $cnx1->prepare($requete_adherent);
$reponse_adherent ->execute([$num_AD]);
$donnees_adherent  = $reponse_adherent->fetch();

if (isset($_POST["Reservation"])) {
    if($donnees_adherent)
    {
        echo "<h3>Merci " . $donnees_adherent["NOM_ADHERENT"] . " pour votre réservation
        <h4 style='text-align: center;'>Il ne vous reste plus qu'a passer en boutique pour retirer votre exemplaire du film";
    }
    else{
        echo "<h3>les coordonnées client saisies sont erronées<h3>";
    }
}
if(array_key_exists("buttonRetour", $_POST)) {
    buttonRetour();
}
function buttonRetour() {
    header("Location: VCIResa3.php");
}
?>
</main>