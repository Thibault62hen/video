<?php
require("../src/Misc_Functions.php");
require("../src/VCILocation.php");
//retrieving the current rented film info , such as user_id, film_id and all info from location
$resultsLocation = getLocation();

if (isset($_POST["supprimerLocation"])){
    $dataDelLocation["supprimerLocation"] = sanitize($_POST["supprimerLocation"]);
    //deleting selected rented film with the film_id passed to $dataDelLocation from the post
    deleteLocation($dataDelLocation);
}
require("../template/VCILocation_vue.php");
?>