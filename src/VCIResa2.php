<?php
require_once("config.php");
require_once("database.php");
$idCatFilm="";
function getFilm()
{
$idCatFilm = sanitize($_POST["selectionFilms"]);
    $requeteFilm = "SELECT * FROM film 
                join star on star.ID_Star=film.ID_REALIS 
                join typefilm on typefilm.CODE_TYPE_FILM=film.CODE_TYPE_FILM 
                where typefilm.CODE_TYPE_FILM = '".$idCatFilm."'";
    $resultsFilm = ConnectDb2($requeteFilm, true);
    return $resultsFilm;
}
?>