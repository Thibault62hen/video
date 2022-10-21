<?php 
require_once("config.php");
require_once("database.php");
//retrieving all existing user and we display it in a select tag
$requete_ListeAdh  = "SELECT NOM_ADHERENT, NUM_ADHERENT FROM ADHERENT ORDER BY NUM_ADHERENT";
$results_ListeAdh  = ConnectDb2($requete_ListeAdh , true);
?>
