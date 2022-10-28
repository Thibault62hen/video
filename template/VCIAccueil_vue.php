<?php
$title = "Bienvenue sur l'accueil du video club";
require("head.php");
?>
<h1>Bienvenue sur le site du vidéo-club</h1>
<h5>Film à l'affiche :</h5>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <!-- DEBUT CAROUSSEL -->
    <div class="container-fluid">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../controleurs/assets/pictures/DesignVideoClub/Transfert-Super-8.png"
                    class="d-flex img-fluid mx-auto" alt="affiche ete">
            </div>
            <?php
                foreach($requete_carouselCat as $value){
                $result = str_ireplace("Mini", "", $value[0]);
                ?>
            <div class="carousel-item">
                <img src="../controleurs/assets/pictures/FilmAffiches/<?=htmlspecialchars($inputCatFull).'/'.htmlspecialchars($result)?>"
                    class="d-flex img-fluid mx-auto" alt="<?=htmlspecialchars($value["titre_film"])?>">
            </div>
            <?php
                }
                ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<?php

require("footer.php");
?>