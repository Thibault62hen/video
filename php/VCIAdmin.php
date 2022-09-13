<?php
// PARTIE TRAITEMENT PHP 

require_once "config.php";
require_once "database.php";

$loginAdmin = "";
$passAdmin = "";

if (isset ($_POST["Nom_Admin"]) || ($_POST["Nom_Admin"] != ""))
{
    $loginAdmin= trim($_POST["Nom_Admin"]);
}
if (isset ($_POST["Pass_Admin"]) || ($_POST["Pass_Admin"] != ""))
{
    $passAdmin= trim($_POST["Pass_Admin"]);
}

// connection à la base
$db=connectDb();
// ecriture de la requete
// SELECT * FROM admin WHERE LOGIN_ADMIN = ? AND PASS_ADMIN = ? 
$sqlRequest = 'SELECT * FROM admin WHERE LOGIN_ADMIN = ? AND PASS_ADMIN = ?';

// Préparation et execution de la requete
$sqlResponse = $db->prepare($sqlRequest);

// mettre les parametres
$sqlResponse -> bindParam(1,$loginAdmin);
$sqlResponse -> bindParam(2,$passAdmin);
$sqlResponse->execute();

// recupération des informations au format objet le 5 en parametre remplace le PDO::FETCH_OBJ
$results = $sqlResponse->rowCount();

//deconnexiond de la base
$db=disconnectDb();
?>

<?php

if($results == 1){

?>
<?php require "VCIMenuAdmin.php"; 
?>
<?php
}
else
{
    header('Location: VCIAccueil.php');
}
?>