<?php
require_once("config.php");
require_once("database.php");

function getLocation()
{
    $requeteLocation = "SELECT * FROM location 
                join adherent on adherent.NUM_ADHERENT=location.NUM_ADHERENT join FILM on film.ID_FILM=location.ID_FILM";
    $resultsLocation = ConnectDb2($requeteLocation, true);
    return $resultsLocation;
}
function deleteLocation($dataDelLocation){
        //retriveing film id currrently located with the associative array $dataDelLocation in $locationID
        $locationID = $dataDelLocation["supprimerLocation"];
        //delete sql request with the correct located film id
        $requeteDeleteLocation = "DELETE FROM LOCATION WHERE ID_FILM = $locationID";
        $results_deleteLocation = ConnectDb2($requeteDeleteLocation, true);
        header("refresh:0;VCILocation_controleur.php");
}
?>