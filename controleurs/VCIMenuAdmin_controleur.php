<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
//check if the current user is admin and allow access to to the admin panel
if($_SESSION["role"] == "admin"){
    $title = "Panel - Administration";
    require("../src/VCIMenuAdmin.php");
    $testUser = getDbInfo("NUsers");
    $testMovie = getDbInfo("NMovies");
    $testCat = getDbInfo("NCat");
    $testLocation = getDbInfo("NLocations");
    $testLocation2 = getDbInfo("NLocations2");
    require("../template/VCIMenuAdmin_vue.php");
}
//current user is not admin so we set him back to the homepage
else{
   header("Location: VCIAccueil_controleur.php");
}
?>