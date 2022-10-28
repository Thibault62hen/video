<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if($_SESSION["role"] == "admin"){
    require("../src/Misc_Functions.php");
//new film post
if (isset($_POST["nouveauFilm"])){
    require("../src/VCINewFilm2.php");
    $fileName = basename($_FILES["newIMG"]["name"]);
    $dataInsert["newTitre"] = sanitize($_POST["newTitre"]);
    $dataInsert["typeFilm"] = sanitize($_POST["typeFilm"]);
    $dataInsert["nomReal"] = sanitize($_POST["nomReal"]);
    $dataInsert["newFilmDate"] = sanitize($_POST["newFilmDate"]);
    $dataInsert["newIMG"] = sanitize($_POST["newIMG"]);
    $dataInsert["newResume"] = sanitize($_POST["newResume"]);
    $dataInsert["newYTLink"] = sanitize($_POST["newYTLink"]);
    //adding a new film with with post info passed to $dataInsert
    insertNewFilm($dataInsert);
}
//deleting film
if (isset($_POST["supprimerFilm"])){
    require("../src/VCINewFilm2.php");
    $dataDel["SelectedDFilm"] = sanitize($_POST["SelectedDFilm"]);
    //deleting the selected film with with post info passed to $dataDel
    deleteFilm($dataDel);
}
if (isset($_POST["editFilm"])){
    require("../src/VCIEditFilm.php");
    $dataEdit["filmIdEdit"] = sanitize($_POST["filmIdEdit"]);
    $dataEdit["titreEdit"] = sanitize($_POST["titreEdit"]);
    $dataEdit["typeFilmEdit"] = sanitize($_POST["typeFilmEdit"]);
    $dataEdit["nomRealEdit"] = sanitize($_POST["nomRealEdit"]);
    $dataEdit["filmdateEdit"] = sanitize($_POST["filmdateEdit"]);
    $dataEdit["imgEdit"] = sanitize($_POST["imgEdit"]);
    $dataEdit["resumeEdit"] = sanitize($_POST["resumeEdit"]);
    $dataEdit["ytlinkEdit"] = sanitize($_POST["ytlinkEdit"]);
    //editing the current selected film with with post info passed to $dataEdit
    editSelectedFilm($dataEdit);
}
//editing film
if (isset($_POST["modifierFilm"])){
    require("../src/VCIEditFilm.php");
    $dataEdit["SelectedDFilm"] = sanitize($_POST["SelectedDFilm"]);
    $editFilmSelected = getEditFilm($dataEdit);
    require("../template/VCIEditFilm_vue.php");
}
//new realisator
if (isset($_POST["nouveauReal"])){
    require("../src/VCINewFilm2.php");
    $dataInsertReal["newRealn"] = sanitize($_POST["newRealn"]);
    $dataInsertReal["newRealp"] = sanitize($_POST["newRealp"]);
    insertNewReal($dataInsertReal);
}
}
else{
   header("Location: VCIAccueil_controleur.php");
}
?>