<?php require "head.php"; 
require_once "config.php";
require_once "database.php";
// Recupération des info passées en post
$idCatFilm="";

// Contôle de la valeur du POST si null ou vide renvoie vers la page d'ou provient le submit
if (isset ($_POST["selectionFilms"]) || ($_POST["selectionFilms"] != ""))
{
    $idCatFilm = $_POST["selectionFilms"];
}
else{
    header('Location: VCIAccueil.php');
}

// connection à la base
$db=connectDb();
// ecriture de la requete
$sqlRequest = 'SELECT * FROM film join star on star.ID_Star=film.ID_REALIS join typefilm on typefilm.CODE_TYPE_FILM=film.CODE_TYPE_FILM where typefilm.CODE_TYPE_FILM =\''.$idCatFilm.'\'';
// Préparation et execution de la requete
$sqlResponse = $db->prepare($sqlRequest);
$sqlResponse->execute();
// recupération des informations au format objet
$results = $sqlResponse->fetchAll(5);
// deconnexion de la base
$db=disconnectDb();
?>
<main>
    <h1>Liste des films de type 
        <?php
        echo $_POST["selectionFilms"];
        ?>
    </h1>
    <h3>Sélectionnez le film que vous désirez réserver</h3>
        <table border="1" align="center" border-collapse="collapse">
            <thead>
                <tr>
                    <th width="200">Titre de film</th>
                    <th width="200">Son Année</th>
                    <th width="200">Realisateur</th>
                    <th width="200">Affiche</th>
                </tr>
            </thead>
            <?php
                foreach ($results as $films){
                    echo"<form method=GET action=VCIResa3.php?film=>";
            ?>
                <tr>
                    <td>
                        <a href="VCIResa3.php?film=<?= $films->ID_FILM. "&typeF=" .$films->CODE_TYPE_FILM?>">
                                <?= $films->TITRE_FILM ?>
                        </a>
                    </td>
                    <td><?= $films->ANNEE_FILM ?></td>
                    <td><?= $films->NOM_STAR. " " .$films->PRENOM_STAR ?></td>
                    <td>
                        <a href="VCIResa3.php?ID_FILM=<?= $films->ID_FILM ?>">
                            <img src="../pictures/FilmMiniatures/<?=$films->LIB_TYPE_FILM.'/'.$films->REF_IMAGE?>" alt="Affiche du film <?= $films->TITRE_FILM ?>">
                        </a>
                     </td>
                    </tr>
                </form>
            <?php 
            }
            ?>
        </table>

<form method="post">
    <input type="submit" name="retourF" value="Retour"> <input type="submit" name="retourA" value="Annulez">
</form>
<?php
      
      if(array_key_exists("retourF", $_POST)) {
        retourFilm();
      }
      else if(array_key_exists("retourA", $_POST)) {
        retourAccueil();
      }

      function retourFilm()
      {
      header("Location: Resa.php");
      }
      function retourAccueil()
      {
      header("Location: VCIAccueil.php");
      }
?>
</main>