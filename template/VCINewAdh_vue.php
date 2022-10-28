<?php 
$title = "Panel - Administration Adherent";
require("headAdmin.php"); 
?>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewAdh2_controleur.php">
                        <div class="text-center">
                                <h3>Veuillez saisir les coordonnées du nouvel adhérent</h3>
                                <hr class="hrstyle1">
                                <input class="InputStyle2" placeholder="Nom" type="text" name="newNom"></input>
                                </br>
                                <input class="InputStyle2" placeholder="Prénom" type="text" name="newPrenom"></input>
                                </br>
                                <input class="InputStyle2" placeholder="Adresse" type="text" name="newAdresse"></input>
                                </br>
                                <input class="InputStyle2" placeholder="Complément d'adresse" type="text"
                                        name="newAdresse2"></input>
                                </br>
                                <input class="InputStyle2" placeholder="Code postal" type="text" name="newCP"></input>
                                </br>
                                <input class="InputStyle2" placeholder="Ville" type="text" name="newVille"></input>
                                </br>
                                <input class="InputStyle2" placeholder="Téléphone" type="text" name="newTel"></input>
                                </br>
                                <div class="text-center mx-auto">
                                        <input type="submit" class="bn632-hover btn632fix bn26" value="Créer"
                                                name="nouveauAdh"></input>
                                        <button type="reset" class="bn632-hover btn632fix bn26">Recommencez</button>
                                </div>
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
                        <select style="display: block;" class="InputStyle2 dropdownInput mx-auto" name="SelectedDAdh">
                                <?php
                            foreach($results_ListeAdh as $reponse_ListeAdh){
                                echo "<option name=".htmlspecialchars($reponse_ListeAdh[NUM_ADHERENT])." value=".htmlspecialchars($reponse_ListeAdh[NUM_ADHERENT])."
                                >" .htmlspecialchars($reponse_ListeAdh[NOM_ADHERENT]). "</option>";
                                }
                        ?>
                        </select>
                        </br>
                        <div class="text-center mx-auto">
                                <input type="submit" class="bn632-hover btn632fix bn25" value="Supprimer"
                                        name="supprimerAdh"></input>
                                <input type="submit" class="bn632-hover btn632fix bn26" value="Modifier"
                                        name="editAdh"></input>
                        </div>
                </form>
        </div>
</div>
<?php require("footer.php");?>