<?php
$title = "Panel - Administration Film";
require("headAdmin.php"); 
?>
<div class="card-NewFilm mx-auto">
    <div class="d-flex justify-content-center">
        <form method="post" action="">
            <div class="text-center">
                <h3>Veuillez saisir les nouvelles coordonnées de l'adhérent</h3>
                <hr class="hrstyle1">
                <input type="hidden" value="<?=htmlspecialchars($editUserSelected["NUM_ADHERENT"])?>" name="userIdEdit">
                                </br>
                <input class="InputStyle2" placeholder="Nom*" type="text" name="nameEdit"
                    value="<?=htmlspecialchars($editUserSelected["NOM_ADHERENT"])?>">
                </br>
                <input class="InputStyle2" placeholder="Prénom*" type="text" name="surnameEdit"
                    value="<?=htmlspecialchars($editUserSelected["PRENOM_ADHERENT"])?>">
                </br>
                <input class="InputStyle2" placeholder="Adresse*" type="text" name="adressEdit"
                    value="<?=htmlspecialchars($editUserSelected["ADR_ADHERENT"])?>">
                </br>
                <input class="InputStyle2" placeholder="Complément d'adresse" type="text" name="adress2Edit"
                    value="<?=htmlspecialchars($editUserSelected["ADR2_ADHERENT"])?>">
                </br>
                <input class="InputStyle2" placeholder="Code postal*" type="text" name="PCEdit"
                    value="<?=htmlspecialchars($editUserSelected["CODEPOSTAL_ADHERENT"])?>">
                </br>
                <input class="InputStyle2" placeholder="Ville*" type="text" name="cityEdit"
                    value="<?=htmlspecialchars($editUserSelected["VILLE_ADHERENT"])?>">
                </br>
                <input class="InputStyle2" placeholder="Téléphone*" type="text" name="phoneEdit"
                    value="<?=htmlspecialchars($editUserSelected["TEL_ADHERENT"])?>">
                </br>
                <div class="text-center mx-auto">
                    <input type="submit" class="bn632-hover btn632fix bn26" value="Modifier" name="editUser">
                </div>
            </div>
        </form>
    </div>
</div>
<?php require("footer.php");
?>