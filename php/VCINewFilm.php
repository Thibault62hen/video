<?php require "VCIMenuAdmin.php"; 
require_once "config.php";
require_once "database.php";
$requete_ListeReal = "SELECT DISTINCT ID_STAR, NOM_STAR, PRENOM_STAR FROM `star` ORDER BY ID_STAR";
$cnx=connectDb();
?>
    <h1>Saisie d'un nouveau film</h1>
    <h3>Veuillez saisir vos coordonnées:</h3>
<main>
    <form  method="post" action="VCINewFilm2.php">
        <div class="IDRES">
                <label>Identifiant : </label>
                <input type="text" name="newID"></input>
        </div>

        <div class="IDRES">
                <label>Titre : </label>
                <input type="text" name="newTitre"></input>
        </div>
                
        <div class="IDRES">
                <label>Type de film : </label>
                <select name="typeFilm">
                        <option value="aventure">Aventure</option>
                        <option value="comedie">Comédie</option>
                        <option value="dessinA">Dessin animé</option>
                        <option value="horreur">Horreur</option>
                </select>
        </div>
         <div class="IDRES">
                <label>Réalisateur : </label>
                <select name="nomReal">
                        <?php
                        $reponse_ListeReal = $cnx->prepare($requete_ListeReal);
                        $reponse_ListeReal->execute();
                            while($donnees_ListeReal = $reponse_ListeReal->fetch()){
                                echo "<option value=" .$donnees_ListeReal[ID_STAR]. "
                                >" .$donnees_ListeReal[NOM_STAR]. " " .$donnees_ListeReal[PRENOM_STAR]. "</option>";
                                }
                        $reponse_ListeReal->closeCursor();
                        ?>
                </select>
        </div>

        <div class="IDRES">
                <label>Année de sortie : </label>
                <input type="text" name="newFilmDate"></input>
        </div>
            
        <div class="IDRES">
                <label>Affiche : </label>
                <input type="text" name="newIMG"></input>
        </div>

        <div class="IDRES">
                <label>Résumé : </label>
                <input type="text" name="newResume"></input>
        </div>
        <input type="submit" value="Créer"></input>
        <button type="button" >Recommencez</button>
    </form>
</main>