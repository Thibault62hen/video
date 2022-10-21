<?php
require_once("config.php");
require_once("database.php");

function showTypeFilm()
{
$requeteSelectTYPE = "SELECT * FROM typefilm";
$resultsTYPEF = connectDb2($requeteSelectTYPE, true);
return $resultsTYPEF;
}
?>