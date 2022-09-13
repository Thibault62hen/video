<?php require "head.php"; 
require_once "config.php";
require_once "database.php";

$db=connectDb();

$sqlRequest = 'SELECT * FROM typefilm';

$sqlResponse = $db->prepare($sqlRequest);
$sqlResponse->execute();

$results = $sqlResponse->fetchAll(PDO::FETCH_OBJ);

$db=disconnectDb();
?>
<main>
    <H1>Sélectionnez le type de film que vous recherchez : </H1>
    <form action="VCIResa2.php" method="post">
        <select style="display: block;margin: 0 auto;" name="selectionFilms">
            <?php
                foreach ($results as $catFilm)
                    {?>
                <option value="<?php echo $catFilm->CODE_TYPE_FILM ?>"> <?= $catFilm->LIB_TYPE_FILM ?></option>
                    <?php 
                    }?>
        </select>
        <br/>
        <input style="display: block;margin: 0 auto;" type="submit" name="Submit" value="Séléctionnez">
    </form>
</main>
<?php
?>
