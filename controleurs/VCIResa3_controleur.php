<?php
require("../src/Misc_Functions.php");
require("../src/VCIResa3.php");
$recupfilm = sanitize($_GET["film"]);
$dataFilm["film"] = sanitize($_GET["film"]);
$dataFilm["typeF"] = sanitize($_GET["typeF"]);
//displaying selected film information such as title, film cover, year production
$donnees_infofilm = showInfoFilm1($dataFilm);
//displaying selected film realisator
$donnees_infofilm2 = showInfoFilm2($dataFilm);
//select the correct film categorie img path 
$showSelectedIMG = showSelectedFilmIMG($dataFilm);
//retrieving current film title to send it into url for the next post request
$recupfilm2 = getDataFilm($dataFilm);
$checkFilmA = checkAvailability($dataFilm);
require("../template/VCIResa3_vue.php");
?>