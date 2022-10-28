<?php
require_once("config.php");
require_once("database.php");
//retrieving all film categorie available and we display it in a select tag
function showTypeFilm()
{
$requeteSelectTYPE = "SELECT * FROM typefilm";
$resultsTYPEF = connectDb2($requeteSelectTYPE, true);
return $resultsTYPEF;
}
?>