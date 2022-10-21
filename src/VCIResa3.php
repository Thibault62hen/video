<?php
require_once("config.php");
require_once("database.php");
$realFilmSelected = "";
function showSelectedFilmIMG($dataFilm){
    $recupfilm = $dataFilm["film"];
    $requete_infofilm = "SELECT ID_FILM, REF_IMAGE, TITRE_FILM, ANNEE_FILM, CODE_TYPE_FILM FROM `film` WHERE ID_FILM = '$recupfilm' ";
    $donnees_infofilm = ConnectDb2($requete_infofilm, false);
    $recupfilm2 = $donnees_infofilm["TITRE_FILM"];
    if($dataFilm["typeF"] == "ACT")
    {
        $resultsIMG = "<img src=../controleurs/assets/pictures/FilmMiniatures/Action/". $donnees_infofilm["REF_IMAGE"]. ">";
    }
    else if($dataFilm["typeF"]  == "COM")
    {
        $resultsIMG = "<img src=../controleurs/assets/pictures/FilmMiniatures/Comedie/". $donnees_infofilm["REF_IMAGE"]. ">";
    }
    else if($dataFilm["typeF"]  == "ANI")
    {
        $resultsIMG = "<img src=../controleurs/assets/pictures/FilmMiniatures/Animation/". $donnees_infofilm["REF_IMAGE"]. ">";
    }
    else if($dataFilm["typeF"]  == "HOR")
    {
        $resultsIMG = "<img src=../controleurs/assets/pictures/FilmMiniatures/Horreur/". $donnees_infofilm["REF_IMAGE"]. ">";
    }
    return $resultsIMG;
}
function getDataFilm($dataFilm){
        $recupfilm = $dataFilm["film"];
        $requete_infofilm = "SELECT ID_FILM, REF_IMAGE, TITRE_FILM, ANNEE_FILM, CODE_TYPE_FILM FROM FILM WHERE ID_FILM = '$recupfilm' ";
        $donnees_infofilm = ConnectDb2($requete_infofilm, false);
        $recupfilm2 = $donnees_infofilm["TITRE_FILM"];
        return $recupfilm2;
}
function showInfoFilm1($dataFilm)
{
        $recupfilm = $dataFilm["film"];
        $requete_infofilm = "SELECT ID_FILM, REF_IMAGE, TITRE_FILM, ANNEE_FILM, CODE_TYPE_FILM FROM FILM WHERE ID_FILM = '$recupfilm' ";
        $donnees_infofilm = ConnectDb2($requete_infofilm, false);
        $realFilmSelected = $donnees_infofilm["TITRE_FILM"];
        return $donnees_infofilm;
}
function showInfoFilm2($dataFilm)
{
        $recupfilm = $dataFilm["film"];
        $requete_infofilm = "SELECT ID_FILM, REF_IMAGE, TITRE_FILM, ANNEE_FILM, CODE_TYPE_FILM FROM FILM WHERE ID_FILM = '$recupfilm' ";
        $donnees_infofilm = ConnectDb2($requete_infofilm, false);
        $realFilmSelected = $donnees_infofilm["TITRE_FILM"];
        $requete_infofilm2 = "SELECT * FROM star INNER JOIN film ON film.ID_REALIS = star.ID_STAR WHERE TITRE_FILM = '$realFilmSelected'";
        $donnees_infofilm2 = ConnectDb2($requete_infofilm2, false);
        return $donnees_infofilm2 ;
}
function checkAvailability($dataFilm)
{
        $filmAvailability = $dataFilm["film"];
        $requete_Availability = "SELECT ID_FILM FROM LOCATION WHERE ID_FILM = '$filmAvailability' ";
        $donnees_Availability = ConnectDb2($requete_Availability, true);
        return $donnees_Availability ;
}
?>