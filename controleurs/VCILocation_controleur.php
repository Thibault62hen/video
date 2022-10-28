<?php
require("../src/Misc_Functions.php");
require("../src/VCILocation.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_SESSION["role"] == "admin"){
//retrieving the current rented film info , such as user_id, film_id and all info from location
$resultsLocation = getLocation();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    foreach(array_keys($_POST) as $dataDelLocation){
        sanitize($dataDelLocation);
        //deleting selected rented film with the film_id passed to $dataDelLocation from the post
        deleteLocation($dataDelLocation);
        }
    }
}
else{
    header("Location: VCIAccueil_controleur.php");
 }
require("../template/VCILocation_vue.php");
?>