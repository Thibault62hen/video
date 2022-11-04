<?php
require_once("config.php");
require_once("database.php");
function getDbInfo($infoType)
{
    if($infoType == "NUsers")
    {
        $usersRequest = "SELECT DISTINCT COUNT(NUM_ADHERENT) from ADHERENT";
        $usersData = ConnectDb2($usersRequest, false);
        return $usersData[0];
    }
    elseif($infoType == "NMovies")
    {
        $moviesRequest = "SELECT COUNT(ID_FILM) from FILM";
        $moviesData = ConnectDb2($moviesRequest, false);
        return $moviesData[0];
    }
    elseif($infoType == "NLocations")
    {
        $locationRequest = "SELECT COUNT(ID_FILM) from LOCATION";
        $locationData = ConnectDb2($locationRequest, false);
        return $locationData[0];
    }
    elseif($infoType == "NLocations2")
    {
        $dateNow = date("Y-m-d");
        $location2Request = "SELECT COUNT(ID_FILM) FROM LOCATION WHERE '".$dateNow."' > DATE_RETOUR";
        $location2Data = ConnectDb2($location2Request, false);
        return $location2Data[0];
    }
    elseif($infoType == "NCat")
    {
        $CatRequest = "SELECT COUNT(CODE_TYPE_FILM) FROM TYPEFILM";
        $CatData = ConnectDb2($CatRequest, false);
        return $CatData[0];
    }
    else{
        return false;
    }
}
?>