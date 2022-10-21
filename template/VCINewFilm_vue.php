<?php
$title = "Panel - Administration Film";
require("headAdmin.php"); 
?>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewFilm2_controleur.php">
                        <div class="text-center">
                                <h3>Veuillez saisir les informations du nouveau film:</h3>
                                <hr class="hrstyle1">
                                <label class="labelForm">Titre : </label>
                                <input class="inputForm inputForm2" type="text" id="titreInsertion"
                                        name="newTitre"></input>
                                </br>
                                <label class="labelForm">Type de film : </label>
                                <select class="inputForm inputForm2" name="typeFilm">
                                        <option value="ACT">Aventure</option>
                                        <option value="COM">Comédie</option>
                                        <option value="ANI">Dessin animé</option>
                                        <option value="HOR">Horreur</option>
                                </select>
                                </br>
                                <label class="labelForm">Réalisateur : </label>
                                <select class="inputForm inputForm2" name="nomReal">
                                        <?php
                            foreach($results_ListeReal as $reponse_ListeReal){
                                echo "<option value=" .htmlspecialchars($reponse_ListeReal[ID_STAR]). "
                                >" .htmlspecialchars($reponse_ListeReal[NOM_STAR]). " " .htmlspecialchars($reponse_ListeReal[PRENOM_STAR]). "</option>";
                                }
                        ?>
                                </select>
                                </br>

                                <label class="labelForm">Année de sortie : </label>
                                <input class="inputForm inputForm2" type="text" id="anneeInsertion"
                                        name="newFilmDate"></input>

                                </br>
                                <label class="labelForm">Résumé : </label>
                                <input class="inputForm inputForm2" type="text" id="resumeInsertion"
                                        name="newResume"></input>
                                </br>
                                <label class="labelForm">Affiche : </label>
                                <input class="inputForm inputForm2" type="file" id="imgInsertion" name="newIMG"></input>
                                </br>
                                <div class="text-center mx-auto">
                                        <input type="submit" class="bn632-hover bn26" value="Créer"
                                                name="nouveauFilm"></input>
                                        <button type="reset" class="bn632-hover bn26">Recommencez</button>
                                </div>
                        </div>
                </form>
        </div>
</div>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewFilm2_controleur.php">
                        <h3>Selectionner le film a supprimer</h3>
                        <hr class="hrstyle1">
                        </br>
                        <select style="display: block;" class="inputForm inputForm2 mx-auto" name="SelectedDFilm">
                                <?php
                            foreach($results_ListeFilm as $reponse_ListeFilm){
                                echo "<option name=".htmlspecialchars($reponse_ListeFilm[ID_FILM])." value=".htmlspecialchars($reponse_ListeFilm[ID_FILM])."
                                >" .htmlspecialchars($reponse_ListeFilm[TITRE_FILM]). "</option>";
                                }
                        ?>
                        </select>
                        </br>
                        <div class="text-center mx-auto">
                                <input type="submit" class="bn632-hover bn25" value="Supprimer"
                                        name="supprimerFilm"></input>
                        </div>
                </form>
        </div>
</div>

<?php require("footer.php");
?>