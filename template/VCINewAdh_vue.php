<?php 
$title = "Panel - Administration Adherent";
require("headAdmin.php"); 
?>
<div class="card-NewFilm mx-auto justify-content-center">
        <h3>Veuillez saisir les coordonnées du nouvel adhérent</h3>
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewAdh2_controleur.php">
                        <hr class="hrstyle1">
                        <label class="labelForm">Nom : </label>
                        <input class="inputForm inputForm2" type="text" name="newNom"></input>
                        </br>
                        <label class="labelForm">Prénom : </label>
                        <input class="inputForm inputForm2" type="text" name="newPrenom"></input>
                        </br>
                        <label class="labelForm">Adresse : </label>
                        <input class="inputForm inputForm2" type="text" name="newAdresse"></input>
                        </br>
                        <label class="labelForm">Adresse 2 : </label>
                        <input class="inputForm inputForm2" type="text" name="newAdresse2"></input>
                        </br>
                        <label class="labelForm">Code postal : </label>
                        <input class="inputForm inputForm2" type="text" name="newCP"></input>
                        </br>
                        <label class="labelForm">Ville : </label>
                        <input class="inputForm inputForm2" type="text" name="newVille"></input>
                        </br>
                        <label class="labelForm">Téléphone : </label>
                        <input class="inputForm inputForm2" type="text" name="newTel"></input>
                        </br>
                        <div class="text-center mx-auto">
                                <input type="submit" class="bn632-hover bn26" value="Créer" name="nouveauAdh"></input>
                                <button type="reset" class="bn632-hover bn26">Recommencez</button>
                        </div>
                </form>
        </div>
</div>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewAdh2_controleur.php">
                        <h3>Selectionner l'adherent a supprimer</h3>
                        <hr class="hrstyle1">
                        </br>
                        <select style="display: block;" class="inputForm inputForm2 mx-auto" name="SelectedDAdh">
                                <?php
                            foreach($results_ListeAdh as $reponse_ListeAdh){
                                echo "<option name=".htmlspecialchars($reponse_ListeAdh[NUM_ADHERENT])." value=".htmlspecialchars($reponse_ListeAdh[NUM_ADHERENT])."
                                >" .htmlspecialchars($reponse_ListeAdh[NOM_ADHERENT]). "</option>";
                                }
                        ?>
                        </select>
                        </br>
                        <div class="text-center mx-auto">
                                <input type="submit" class="bn632-hover bn25" value="Supprimer"
                                        name="supprimerAdh"></input>
                        </div>
                </form>
        </div>
</div>
<?php require("footer.php");?>