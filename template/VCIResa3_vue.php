<?php 
$title = "Connection Adherent location";
require("head.php"); 
?>
<H1>Voici le film que vous avez sélectionnez</h1>
<div class="justify-content-center col-lg-3 mx-auto">
    <div class="col-auto">
        <table class="table table-striped table-dark">
            <tr>
                <th><?php 
                            echo $showSelectedIMG;
                        ?>
                </th>
                <th>
                    <p>Titre : <?=htmlspecialchars($donnees_infofilm["TITRE_FILM"])?>
                    </p>
                    <p>Année : <?=htmlspecialchars($donnees_infofilm["ANNEE_FILM"])?>
                    </p>
                    <p>Réalisateur :
                        <?=htmlspecialchars($donnees_infofilm2["NOM_STAR"]. " " . $donnees_infofilm2["PRENOM_STAR"])?>
                    </p>
                    <?php
                    //there is no return from the table location so the film is available
                    if(!$checkFilmA){
                    ?>
                    <p>Disponibilité :   <i class="fa-solid fa-check InfoValidation"></i></p>
                    <?php
                    }
                    else{
                    ?>
                    <p>Disponibilité :   <i class="fa-solid fa-xmark InfoErreur"></i></p>
                    <?php
                    }
                    ?>
                </th>
            </tr>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center text-center">
    <form action="VCIResa4_controleur.php?film=<?=$recupfilm2?>&id=<?=$recupfilm?>" method="post"
        name="ValidationAdherent">
        <h3>Veuillez saisir vos coordonnées:</h3>
        <?php
        //there is no return from the table location so the film is available
        if(!$checkFilmA){
        ?>
        <input class="InputStyle2" placeholder="nom adherent" name="nomADHERENT" type="text" required="required"></input>
        </br>
        <input class="InputStyle2" placeholder="numéro adherent" name="noADHERENT" type="text" required="required"></input>
        </br>
        <?php
        }
        else{
        ?>
        <input class="InputStyle2" placeholder="nom adherent"  name="nomADHERENT" type="text" disabled></input>
        </br>
        <input class="InputStyle2" placeholder="numéro ahderent"  name="noADHERENT" type="text" disabled></input>
        </br>
        <?php
        }
        ?>
</div>
<div class="text-center mx-auto">
    <input class="bn632-hover bn26" type="submit" value="Réservez" name="Reservation"></input>
    <button class="bn632-hover bn26" type="button" onclick="history.go(-1)">Annulez</button>
</div>
</form>
<?php require("footer.php");?>