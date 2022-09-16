<?php require "VCIMenuAdmin.php"; 
require_once "config.php";
require_once "database.php";
$requete_ListeReal = "SELECT DISTINCT ID_STAR, NOM_STAR, PRENOM_STAR FROM `star` ORDER BY ID_STAR";
$cnx=connectDb();
?>

<main>
<div class="d-flex justify-content-center">
                <form method="post" action="VCINewFilm2.php">
                        <h3>Veuillez saisir vos coordonnées:</h3>
                        <label>Identifiant : </label>
                        <input type="text" id="idInsertion" name="newID"></input>
                        </br>
                        <label>Titre : </label>
                        <input type="text" id="titreInsertion" name="newTitre"></input>
                        </br>
                        <label>Type de film : </label>
                        <select name="typeFilm">
                                <option value="ACT">Aventure</option>
                                <option value="COM">Comédie</option>
                                <option value="ANI">Dessin animé</option>
                                <option value="HOR">Horreur</option>
                        </select>
                        </br>
                        <label>Réalisateur : </label>
                        <select name="nomReal">
                                <?php
                        $reponse_ListeReal = $cnx->prepare($requete_ListeReal);
                        $reponse_ListeReal->execute();
                            while($donnees_ListeReal = $reponse_ListeReal->fetch()){
                                echo "<option value=" .$donnees_ListeReal[ID_STAR]. "
                                >" .$donnees_ListeReal[NOM_STAR]. " " .$donnees_ListeReal[PRENOM_STAR]. "</option>";
                                }
                        $reponse_ListeReal->closeCursor();
                        ?>
                        </select>
                        </br>

                        <label>Année de sortie : </label>
                        <input type="text" id="anneeInsertion" name="newFilmDate"></input>

                        </br>

                        <label>Affiche : </label>
                        <input type="text" id="imgInsertion" name="newIMG"></input>
                        </br>
                        <label>Résumé : </label>
                        <input type="text" id="resumeInsertion" name="newResume"></input>
                        </br>
                        <input type="submit" class="bn632-hover bn26" value="Créer" name="nouveauFilm"></input>
                        <button type="button" id="btnClear" class="bn632-hover bn26">Recommencez</button>
                </form>
        </div>
        </div>
</main>
<?php require "pied.php";?>