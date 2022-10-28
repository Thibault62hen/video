<?php
$title = "Panel - Administration Film";
require("headAdmin.php"); 
?>
<div class="card-NewFilm mx-auto">
        <div class="d-flex justify-content-center">
                <form method="post" action="">
                        <div class="text-center">
                                <h3>Veuillez saisir les nouvelles informations du film:</h3>
                                <hr class="hrstyle1">
                                <input type="hidden" value="<?=htmlspecialchars($editFilmSelected["ID_FILM"])?>"
                                        name="filmIdEdit">
                                </br>
                                <input class="InputStyle2" type="text" placeholder="titre" name="titreEdit"
                                        value="<?=htmlspecialchars($editFilmSelected["TITRE_FILM"])?>">
                                </br>
                                <select class="InputStyle2 dropdownInput" name="typeFilmEdit">
                                        <option value="" disabled>Type du film</option>
                                        <option <?php
                                        if($editFilmSelected["CODE_TYPE_FILM"] == "ACT"){
                                        echo "selected ";}?>value="ACT">Action</option>
                                        <option <?php
                                        if($editFilmSelected["CODE_TYPE_FILM"] == "COM"){
                                        echo "selected ";}?>value="COM">Comédie</option>
                                        <option <?php
                                        if($editFilmSelected["CODE_TYPE_FILM"] == "ANI"){
                                        echo "selected ";}?>value="ANI">Dessin animé</option>
                                        <option <?php
                                        if($editFilmSelected["CODE_TYPE_FILM"] == "HOR"){
                                        echo "selected ";}?>value="HOR">Horreur</option>
                                        <option <?php
                                        if($editFilmSelected["CODE_TYPE_FILM"] == "POL"){
                                        echo "selected ";}?>value="POL">Policier</option>
                                        <option <?php
                                        if($editFilmSelected["CODE_TYPE_FILM"] == "SCF"){
                                        echo "selected ";}?>value="SCF">Science fiction</option>
                                </select>
                                </br>
                                <select class="InputStyle2 dropdownInput" name="nomRealEdit">
                                        <option value="" disabled>Nom réalisateur</option>
                                        <option value="<?=htmlspecialchars($editFilmSelected["ID_REALIS"])?>">
                                                <?=htmlspecialchars($editFilmSelected["NOM_STAR"]). " " .htmlspecialchars($editFilmSelected["PRENOM_STAR"])?>
                                        </option>
                                        <?php
                            foreach($results_ListeReal as $reponse_ListeReal){
                                echo "<option value=" .htmlspecialchars($reponse_ListeReal[ID_STAR]). "
                                >" .htmlspecialchars($reponse_ListeReal[NOM_STAR]). " " .htmlspecialchars($reponse_ListeReal[PRENOM_STAR]). "</option>";
                                }
                        ?>
                                </select>
                                </br>
                                <select class="InputStyle2 dropdownInput" name="filmdateEdit">
                                        <option value="" disabled>Année de production</option>
                                        <option value="<?=htmlspecialchars($editFilmSelected["ANNEE_FILM"])?>" selected>
                                                <?=htmlspecialchars($editFilmSelected["ANNEE_FILM"])?></option>
                                        <?php
                                        for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                        <option value="<?=htmlspecialchars($year);?>"><?=htmlspecialchars($year);?>
                                        </option>
                                        <?php endfor; ?>
                                </select>

                                </br>
                                <input class="InputStyle2" placeholder="Résumé du film" type="text" id="resumeEdit"
                                        name="resumeEdit" value="<?=htmlspecialchars($editFilmSelected["RESUME"])?>">
                                </br>
                                <input class="InputStyle2" type="file" id="imgEdit" name="imgEdit">
                                </br>
                                <input class="InputStyle2" type="text" placeholder="Lien youtube bande annonce"
                                        id="ytEdit" name="ytlinkEdit"
                                        value="<?=htmlspecialchars($editFilmSelected["YT_LINK"])?>">
                                </br>
                                <div class="text-center mx-auto">
                                        <input type="submit" class="bn632-hover btn632fix bn26" value="Modifier"
                                                name="editFilm">
                                </div>
                        </div>
                </form>
        </div>
</div>
<?php require("footer.php");
?>