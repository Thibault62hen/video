<?php 
$title = "Panel - Administration Location";
require("headAdmin.php"); 
?>
<h3>Location en cours</h3>
<div class="justify-content-center col-lg-6 mx-auto">
    <div class="col-auto">
        <table class="table table-bordered table-dark table-hover">
            <thead>
                <tr>
                    <th>Adherent</th>
                    <th>Films</th>
                    <th>Date retour</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
                $dateNow = date("Y-m-d");
                foreach ($resultsLocation as $location){  
                 ?>
            <tbody>
                <tr>
                    <td><?=htmlspecialchars($location["NOM_ADHERENT"])?></td>
                    <td><?=htmlspecialchars($location["TITRE_FILM"])?></td>
                    <?php
                if($dateNow > $location["DATE_RETOUR"])
                {
                    ?>
                    <td class="text-danger">
                        <form method="post" action="">
                            <?=htmlspecialchars($location["DATE_RETOUR"])?>
                    </td>
                    <?php
                }
                else{
                ?>
                    <td>
                        <?=htmlspecialchars($location["DATE_RETOUR"])?>
                    </td>
                    <?php 
                }
                ?>
                    <td>
                        <input class="inputLocation" type="checkbox" name="<?=htmlspecialchars($location["ID_FILM"])?>"
                            value="R<?=htmlspecialchars($location["ID_FILM"])?>">
                    </td>
                </tr>
            <tbody>
                <?php 
                }
            ?>
        </table>
        <form method="post" action="VCILocation_controleur.php">
            <button type="submit" class="bn632-hover bn25" id="testdel"
                value="<?=htmlspecialchars($location["ID_FILM"])?>">Supprimer</button>
        </form>
    </div>
</div>
<?php require("footer.php");
?>