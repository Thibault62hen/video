<?php 
$title = "Sélection film location";
require("head.php"); 
?>
<h1>Liste des films de type
    <?php
        echo $_POST["selectionFilms"];
        ?>
</h1>
<div class="justify-content-center col-lg-6 mx-auto">
    <div class="col-auto">
        <?php
            //there is no return from the slected category
            if(!$resultsFilm){
                 echo "<h2>Aucun films correspondants<h2>";
            }
            else{
            ?>
            <h3>Sélectionnez le film que vous désirez réserver</h3>
            <table class="table table-bordered table-dark table-hover">
            <thead>
                <tr>
                    <th>Titre de film</th>
                    <th>Son Année</th>
                    <th>Realisateur</th>
                    <th>Affiche</th>
                </tr>
            </thead>
            <?php
                foreach ($resultsFilm as $films){
                    echo"<form method=GET action=VCIResa3.php?film=>";
            ?>
            <tr>
                <td>
                    <a class="filmTitle"
                        href="VCIResa3_controleur.php?film=<?=htmlspecialchars($films["ID_FILM"]). "&typeF=" .htmlspecialchars($films["CODE_TYPE_FILM"])?>">
                        <?=htmlspecialchars($films["TITRE_FILM"])?>
                    </a>
                </td>
                <td><?=htmlspecialchars($films["ANNEE_FILM"])?></td>
                <td><?=htmlspecialchars($films["NOM_STAR"]). " " .htmlspecialchars($films["PRENOM_STAR"])?></td>
                <td>
                    <a href="VCIResa3_controleur.php?film=<?=htmlspecialchars($films["ID_FILM"]). "&typeF=" .htmlspecialchars($films["CODE_TYPE_FILM"])?>">
                        <img src="assets/pictures/FilmMiniatures/<?=htmlspecialchars($films["LIB_TYPE_FILM"]).'/'.htmlspecialchars($films["REF_IMAGE"])?>"
                            alt="Affiche du film <?=htmlspecialchars($films["TITRE_FILM"])?>">
                    </a>
                </td>
            </tr>
            </form>
            <?php 
            }
        }
            ?>
        </table>
    </div>
</div>
<div class="text-center">
    <button type="button" class="bn632-hover bn26" onclick="history.go(-1)" name="retourF">Retour</button>
</div>
<?php require("footer.php");
?>