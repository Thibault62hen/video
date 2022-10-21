<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if($_SESSION["role"] == "admin"){
    require("../src/VCINewFilm.php");
    require("../template/VCINewFilm_vue.php");
}
else{
   header("Location: VCIAccueil_controleur.php");
}
?>