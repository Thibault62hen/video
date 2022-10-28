<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if($_SESSION["role"] == "admin"){
require("../src/Misc_Functions.php");
if (isset($_POST["nouveauAdh"])){
    require("../src/VCINewAdh2.php");
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
    require("../src/VCINewAdh2.php");
    $dataDel2["SelectedDAdh"] = sanitize($_POST["SelectedDAdh"]);
    //deleting the selected user with with post info passed to $dataDel2
    deleteAdh($dataDel2);
}
//editing user information
if (isset($_POST["editAdh"])){
    require("../src/VCIEditAdh.php");
    $dataEdit["SelectedDAdh"] = sanitize($_POST["SelectedDAdh"]);
    $editUserSelected = getEditUser($dataEdit);
    require("../template/VCIEditAdh_vue.php");
}
if (isset($_POST["editUser"])){
    require("../src/VCIEditAdh.php");
    $dataEdit["userIdEdit"] = sanitize($_POST["userIdEdit"]);
    $dataEdit["nameEdit"] = sanitize($_POST["nameEdit"]);
    $dataEdit["surnameEdit"] = sanitize($_POST["surnameEdit"]);
    $dataEdit["adressEdit"] = sanitize($_POST["adressEdit"]);
    $dataEdit["adress2Edit"] = sanitize($_POST["adress2Edit"]);
    $dataEdit["PCEdit"] = sanitize($_POST["PCEdit"]);
    $dataEdit["cityEdit"] = sanitize($_POST["cityEdit"]);
    $dataEdit["phoneEdit"] = sanitize($_POST["phoneEdit"]);
    editSelectedUser($dataEdit);
}
}
else{
   header("Location: VCIAccueil_controleur.php");
}
?>