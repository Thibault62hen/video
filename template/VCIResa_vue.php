<?php 
$title = "Sélection catégorie film location";
require("head.php"); 
?>
<H1>Sélectionnez le type de film que vous recherchez : </H1>
<div class="text-center">
    <form action="VCIResa2_controleur.php" method="post">
        <select name="selectionFilms">
            <?php
                foreach ($resultsTYPEF as $catFilm)
                    {?>
            <option value="<?=htmlspecialchars($catFilm["CODE_TYPE_FILM"])?>">
                <?=htmlspecialchars($catFilm["LIB_TYPE_FILM"])?></option>
            <?php 
                    }?>
        </select>
        <br />
        <input class="bn632-hover bn26" type="submit" name="Submit" value="Séléctionnez">
</div>
</form>
<?php
require("footer.php");
?>