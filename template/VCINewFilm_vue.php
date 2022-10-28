<?php
$title = "Panel - Administration Film";
require("headAdmin.php"); 
?>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewFilm2_controleur.php" enctype="multipart/form-data">
                        <div class="text-center">
                                <h3>Veuillez saisir les informations du nouveau film:</h3>
                                <hr class="hrstyle1">
                                <input class="InputStyle2" type="text" placeholder="titre" id="titreInsertion"
                                        name="newTitre">
                                </br>
                                <select class="InputStyle2 dropdownInput" name="typeFilm">
                                        <option value="" disabled>Type du film</option>
                                        <option value="ACT">Action</option>
                                        <option value="COM">Comédie</option>
                                        <option value="ANI">Dessin animé</option>
                                        <option value="HOR">Horreur</option>
                                        <option value="POL">Policier</option>
                                        <option value="SCF">Science fiction</option>
                                </select>
                                </br>
                                <select class="InputStyle2 dropdownInput" name="nomReal">
                                        <option value="" disabled>Nom du réalisateur</option>
                                        <?php
                                        //displaying every realisator in the select tag
                            foreach($results_ListeReal as $reponse_ListeReal){
                                echo "<option value=" .htmlspecialchars($reponse_ListeReal[ID_STAR]). "
                                >" .htmlspecialchars($reponse_ListeReal[NOM_STAR]). " " .htmlspecialchars($reponse_ListeReal[PRENOM_STAR]). "</option>";
                                }
                        ?>
                                </select>
                                </br>
                                        <select class="InputStyle2 dropdownInput" name="newFilmDate">
                                        <option value="" disabled>Année de production</option>
                                        <?php
                                        //displaying 1900-current year for the year production select tag
                                        for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                        <option value="<?=htmlspecialchars($year);?>"><?=htmlspecialchars($year);?></option>
                                        <?php endfor; ?>
                                </select>
                                </br>
                                <input class="InputStyle2" placeholder="Résumé du film" type="text" id="resumeInsertion"
                                        name="newResume">
                                </br>
                                <input class="InputStyle2" type="file" id="imgInsertion" name="newIMG">
                                </br>
                                <input class="InputStyle2" type="text" placeholder="Lien youtube bande annonce"
                                        id="ytInsertion" name="newYTLink">
                                </br>
                                <div class="text-center mx-auto">
                                        <input type="submit" class="bn632-hover btn632fix bn26" value="Créer"
                                                name="nouveauFilm">
                                        <button type="reset" class="bn632-hover btn632fix bn26">Recommencez</button>
                                </div>
                        </div>
                </form>
        </div>
</div>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewFilm2_controleur.php">
                        <h3>Selectionner le film a supprimer/modifier</h3>
                        <hr class="hrstyle1">
                        </br>
                        <select style="display: block;" class="InputStyle2 dropdownInput mx-auto" name="SelectedDFilm">
                                <?php
                            foreach($results_ListeFilm as $reponse_ListeFilm){
                                echo "<option name=".htmlspecialchars($reponse_ListeFilm[ID_FILM])." value=".htmlspecialchars($reponse_ListeFilm[ID_FILM])."
                                >" .htmlspecialchars($reponse_ListeFilm[TITRE_FILM]). "</option>";
                                }
                        ?>
                        </select>
                        </br>
                        <div class="text-center mx-auto">
                                <input type="submit" class="bn632-hover btn632fix bn25" value="Supprimer"
                                        name="supprimerFilm">
                                <input type="submit" class="bn632-hover btn632fix bn26" value="Modifier"
                                        name="modifierFilm">
                        </div>
                </form>
        </div>
</div>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="VCINewFilm2_controleur.php">
                        <div class="text-center">
                                <h3>Veuillez saisir les informations du nouveau réalisateur</h3>
                                <hr class="hrstyle1">
                                <input class="InputStyle2" type="text" placeholder="Nom realisateur" name="newRealn">
                                </br>
                                <input class="InputStyle2" placeholder="Prenom realisateur" type="text" name="newRealp">
                                </br>
                                <div class="text-center mx-auto">
                                        <input type="submit" class="bn632-hover btn632fix bn26" value="Créer"
                                                name="nouveauReal">
                                </div>
                        </div>
                </form>
        </div>
</div <?php require("footer.php");
?>