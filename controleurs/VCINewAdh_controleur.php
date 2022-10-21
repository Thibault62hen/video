<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if($_SESSION["role"] == "admin"){
    require("../src/VCINewAdh.php");
    require("../template/VCINewAdh_vue.php");
}
else{
   header("Location: VCIAccueil_controleur.php");
}
?>