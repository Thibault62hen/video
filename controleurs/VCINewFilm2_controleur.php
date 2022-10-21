<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if($_SESSION["role"] == "admin"){
    require("../src/Misc_Functions.php");
    require("../src/VCINewFilm2.php");
if (isset($_POST["nouveauFilm"])){
    $dataInsert["newTitre"] = sanitize($_POST["newTitre"]);
    $dataInsert["typeFilm"] = sanitize($_POST["typeFilm"]);
    $dataInsert["nomReal"] = sanitize($_POST["nomReal"]);
    $dataInsert["newFilmDate"] = sanitize($_POST["newFilmDate"]);
    $dataInsert["newIMG"] = sanitize($_POST["newIMG"]);
    $dataInsert["newResume"] = sanitize($_POST["newResume"]);
    //adding a new film with with post info passed to $dataInsert
    insertNewFilm($dataInsert);
}
if (isset($_POST["supprimerFilm"])){
    $dataDel["SelectedDFilm"] = sanitize($_POST["SelectedDFilm"]);
    //deleting the selected film with with post info passed to $dataDel
    deleteFilm($dataDel);
}
}
else{
   header("Location: VCIAccueil_controleur.php");
}
?>