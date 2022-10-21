<?php 
$title = "Panel - Administration Location";
require("headAdmin.php"); 
?>
<h3>Location en cours</h3>
<div class="justify-content-center col-lg-6 mx-auto">
    <div class="col-auto">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Adherent</th>
                    <th>Films</th>
                    <th>Date retour</th>
                </tr>
            </thead>
            <?php
                $dateNow = date("Y-m-d");
                foreach ($resultsLocation as $location){  
                 ?>
            <tr>
                <td><?=htmlspecialchars($location["NOM_ADHERENT"])?></td>
                <td><?=htmlspecialchars($location["TITRE_FILM"])?></td>
                <?php
                if($dateNow > $location["DATE_RETOUR"])
                {
                    ?>
                <td class="text-danger">
                    <form method="post" action="">
                        <?=htmlspecialchars($location["DATE_RETOUR"])?><button type="submit" class="bn632-hover bn25"
                            value="<?=htmlspecialchars($location["ID_FILM"])?>"
                            name="supprimerLocation">Supprimer</button>
                    </form>
                </td>
                <?php
                }
                else{
                ?>
                <td>
                    <form method="post" action="">
                        <?=htmlspecialchars($location["DATE_RETOUR"])?><button type="submit" class="bn632-hover bn25"
                            value="<?=htmlspecialchars($location["ID_FILM"])?>"
                            name="supprimerLocation">Supprimer</button>
                    </form>
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
<?php require("footer.php");
?>