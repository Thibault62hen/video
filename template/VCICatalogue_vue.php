<?php
$title = "Catalogue film disponible";
require("head.php");
?>
<div class="gallery">
    <h1>Catalogue</h1>
    <hr class="hrstyle1">
</div>
<div class="text-center catalogueBtn">
    <button class="filter-button" data-filter="all">Tous</button>
    <button class="filter-button" data-filter="categoryACT">Action</button>
    <button class="filter-button" data-filter="categoryCOM">Comedie</button>
    <button class="filter-button" data-filter="categoryANI">Animation</button>
    <button class="filter-button" data-filter="categoryHOR">Horreur</button>
</div>

<br />
<div class="container-fluid d-flex wrap">
<div class="row justify-content-center">
    <?php
    foreach($requete_filmACT as $valueACT){
    ?>
    <div class="tile filter categoryACT">
        <img class="img-fluid"
            src="../controleurs/assets/pictures/FilmAffiches/Action/<?=htmlspecialchars(str_ireplace("Mini", "", $valueACT["REF_IMAGE"]))?>">
        <div class="text">
            <h4 class="animate-text"><?=htmlspecialchars($valueACT["TITRE_FILM"])?></h4>
            <h5 class="animate-text"><?=htmlspecialchars($valueACT["ANNEE_FILM"])?></h5>
            <p class="animate-text"><?=htmlspecialchars($valueACT["RESUME"])?></p>
            <a target="_blank" href=<?=htmlspecialchars($valueACT["YT_LINK"])?>>
            <button class="ytButton ytEffect animate-text">
                    <i class="fab fa-youtube"></i>
                    Regarder la bande annonce
            </button></a>
        </div>
    </div>
    <?php
    }
    ?>
    <?php
    foreach($requete_filmCOM as $valueCOM){
    ?>
    <div class="tile filter categoryCOM">
        <img class="img-fluid" 
            src="../controleurs/assets/pictures/FilmAffiches/Comedie/<?=htmlspecialchars(str_ireplace("Mini", "", $valueCOM["REF_IMAGE"]))?>">
        <div class="text">
            <h4 class="animate-text"><?=htmlspecialchars($valueCOM["TITRE_FILM"])?></h4>
            <h5 class="animate-text"><?=htmlspecialchars($valueCOM["ANNEE_FILM"])?></h5>
            <p class="animate-text"><?=htmlspecialchars($valueCOM["RESUME"])?></p>
            <a target="_blank" href=<?=htmlspecialchars($valueCOM["YT_LINK"])?>>
            <button class="ytButton ytEffect animate-text">
                    <i class="fab fa-youtube"></i>
                    Regarder la bande annonce
            </button></a>
        </div>
    </div>
    <?php
                }
                ?>
    <?php
                foreach($requete_filmANI as $valueANI){
                ?>
    <div class="tile filter categoryANI">
        <img
            src="../controleurs/assets/pictures/FilmAffiches/Animation/<?=htmlspecialchars(str_ireplace("Mini", "", $valueANI["REF_IMAGE"]))?>">
        <div class="text">
            <h4 class="animate-text"><?=htmlspecialchars($valueANI["TITRE_FILM"])?></h4>
            <h5 class="animate-text"><?=htmlspecialchars($valueANI["ANNEE_FILM"])?></h5>
            <p class="animate-text"><?=htmlspecialchars($valueANI["RESUME"])?></p>
            <a target="_blank" href=<?=htmlspecialchars($valueANI["YT_LINK"])?>>
            <button class="ytButton ytEffect animate-text">
                    <i class="fab fa-youtube"></i>
                    Regarder la bande annonce
            </button></a>
        </div>
    </div>
    <?php
    }
    ?>
    <?php
    foreach($requete_filmHOR as $valueHOR){
    ?>
    <div class="tile filter categoryHOR">
        <img
            src="../controleurs/assets/pictures/FilmAffiches/Horreur/<?=htmlspecialchars(str_ireplace("Mini", "", $valueHOR["REF_IMAGE"]))?>">
        <div class="text">
            <h4 class="animate-text"><?=htmlspecialchars($valueHOR["TITRE_FILM"])?></h4>
            <h5 class="animate-text"><?=htmlspecialchars($valueHOR["ANNEE_FILM"])?></h5>
            <p class="animate-text"><?=htmlspecialchars($valueHOR["RESUME"])?></p>
            <a target="_blank" href=<?=htmlspecialchars($valueHOR["YT_LINK"])?>>
            <button class="ytButton ytEffect animate-text">
                    <i class="fab fa-youtube"></i>
                    Regarder la bande annonce
            </button></a>
        </div>
    </div>
    <?php
    }
    ?>
</div>
</div>
<?php
require("footer.php");
?>