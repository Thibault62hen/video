<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if($_SESSION["role"] == "admin"){
require("../src/Misc_Functions.php");
require("../src/VCINewAdh2.php");
if (isset($_POST["nouveauAdh"])){
    $dataInsert2["newNom"] = sanitize($_POST["newNom"]);
    $dataInsert2["newPrenom"] = sanitize($_POST["newPrenom"]);
    $dataInsert2["newAdresse"] = sanitize($_POST["newAdresse"]);
    $dataInsert2["newAdresse2"] = sanitize($_POST["newAdresse2"]);
    $dataInsert2["newCP"] = sanitize($_POST["newCP"]);
    $dataInsert2["newVille"] = sanitize($_POST["newVille"]);
    $dataInsert2["newTel"] = sanitize($_POST["newTel"]); 
    //adding a new user with with post info passed to $dataInsert2
    insertNewAdh($dataInsert2);
}
if (isset($_POST["supprimerAdh"])){
    $dataDel2["SelectedDAdh"] = sanitize($_POST["SelectedDAdh"]);
    //deleting the selected user with with post info passed to $dataDel2
    deleteAdh($dataDel2);
}
}
else{
   header("Location: VCIAccueil_controleur.php");
}
?>