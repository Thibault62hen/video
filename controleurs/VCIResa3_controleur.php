<?php
require("../src/Misc_Functions.php");
require("../src/VCIResa3.php");
$recupfilm = sanitize($_GET["film"]);
$dataFilm["film"] = sanitize($_GET["film"]);
$dataFilm["typeF"] = sanitize($_GET["typeF"]);
//title and year
$donnees_infofilm = showInfoFilm1($dataFilm);
//realisator name
$donnees_infofilm2 = showInfoFilm2($dataFilm);
//current movie miniature
$showSelectedIMG = showSelectedFilmIMG($dataFilm);
$recupfilm2 = getDataFilm($dataFilm);

$checkFilmA = checkAvailability($dataFilm);
require("../template/VCIResa3_vue.php");
?>