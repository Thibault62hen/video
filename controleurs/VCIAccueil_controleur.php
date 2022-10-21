<?php
require("../src/Misc_Functions.php");
require("../src/VCIAccueil.php");
//Select random film categorie
$inputCatFull = selectRandCarousel();
//Display 5 random film cover from the random categorie selected previously
$requete_carouselCat = showCarousel();
require("../template/VCIAccueil_vue.php");
?>