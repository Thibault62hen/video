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
    <div class="row justify-content-center">
        <div class="col-auto">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Titre de film</th>
                        <th>Son Année</th>
                        <th>Realisateur</th>
                        <th>Affiche</th>
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
                            <img src="../pictures/FilmMiniatures/<?=$films->LIB_TYPE_FILM.'/'.$films->REF_IMAGE?>"
                                alt="Affiche du film <?= $films->TITRE_FILM ?>">
                        </a>
                    </td>
                </tr>
                </form>
                <?php 
            }
            ?>
            </table>
        </div>
    </div>
    <form method="post">
        <div class="text-center">
            <button class="bn632-hover bn26"  onclick="history.go(-1)" name="retourF">Retour</button>
            <input class="bn632-hover bn26"  name="retourA" value="Annulez">
        </div>
    </form>
    <?php
      
      if(array_key_exists("retourA", $_POST)) {
        header("Location: VCIAccueil.php");
      }
?>
</main>
<?php require "pied.php";?>