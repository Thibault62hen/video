<?php
require_once("config.php");
require_once("database.php");
//ACTION Gallery sql request
function showACT()
{
        $requete_filmACT = "SELECT TITRE_FILM, RESUME, REF_IMAGE, ANNEE_FILM, YT_LINK FROM FILM WHERE CODE_TYPE_FILM = 'ACT'";
        $donnees_filmACT  = ConnectDb2($requete_filmACT, true);
        return $donnees_filmACT;
}
//COMEDIE Gallery sql request
function showCOM()
{
        $requete_filmCOM = "SELECT TITRE_FILM, RESUME, REF_IMAGE, ANNEE_FILM, YT_LINK FROM FILM WHERE CODE_TYPE_FILM = 'COM'";
        $donnees_filmCOM  = ConnectDb2($requete_filmCOM, true);
        return $donnees_filmCOM;
}
//ANIMATION Gallery sql request
function showANI()
{
        $requete_filmANI = "SELECT TITRE_FILM, RESUME, REF_IMAGE, ANNEE_FILM, YT_LINK FROM FILM WHERE CODE_TYPE_FILM = 'ANI'";
        $donnees_filmANI  = ConnectDb2($requete_filmANI, true);
        return $donnees_filmANI;
}
//HORROR Gallery sql request
function showHOR()
{
        $requete_filmHOR = "SELECT TITRE_FILM, RESUME, REF_IMAGE, ANNEE_FILM, YT_LINK FROM FILM WHERE CODE_TYPE_FILM = 'HOR'";
        $donnees_filmHOR  = ConnectDb2($requete_filmHOR, true);
        return $donnees_filmHOR;
}
?>