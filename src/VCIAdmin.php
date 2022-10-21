<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
require("../src/Misc_Functions.php");
require_once("config.php");
require_once("database.php");

//sanitize login output
$loginAdmin= sanitize($_POST["Nom_Admin"]);
$passAdmin= sanitize($_POST["Pass_Admin"]);

$requeteAdmin = "SELECT LOGIN_ADMIN, PASS_ADMIN FROM ADMIN WHERE LOGIN_ADMIN = '".$loginAdmin."' AND PASS_ADMIN = '".$passAdmin."'";
$dataLogin = connectDb2($requeteAdmin, true);
?>

<?php 
// if the admin pass are correct we can access to the admin panel and a session role "admin" is given
if($dataLogin || $_SESSION["role"] == "admin"){
    header("Location: ../controleurs/VCIMenuAdmin_controleur.php");
    $_SESSION["role"] = "admin";
}
//admin pass are invalid we set the session role to "none" and redirect to the homepage
else
{
    $_SESSION["role"] = "none";
    header("Location: ../controleurs/VCIAccueil_controleur.php");
}
?>