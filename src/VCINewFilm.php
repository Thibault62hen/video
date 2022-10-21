<?php 
require_once("config.php");
require_once("database.php");
//retrieving all existing realisator and we display it in a select tag for the form info
$requete_ListeReal = "SELECT DISTINCT ID_STAR, NOM_STAR, PRENOM_STAR FROM STAR ORDER BY ID_STAR";
$results_ListeReal = ConnectDb2($requete_ListeReal, true);
//retrieving all existing film and we display it in a select tag
$requete_ListeFilm = "SELECT TITRE_FILM, ID_FILM FROM FILM ORDER BY ID_FILM";
$results_ListeFilm = ConnectDb2($requete_ListeFilm, true);
?>