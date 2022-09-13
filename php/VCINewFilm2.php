<?php require "VCIMenuAdmin.php"; 
require_once "config.php";
require_once "database.php";

$newID = $_POST["newID"];
$newTitre = $_POST["newTitre"];
$typeFilm = $_POST["typeFilm"];
$nomReal = $_POST["nomReal"];
$newFilmDate = $_POST["newFilmDate"];
$newIMG = $_POST["newIMG"];
$newResume = $_POST["newResume"];

$donnees = [
    "id" => $newID, 
    "typeF" => $typeFilm,
    "idreal" => $nomReal, 
    "titre" => $newTitre, 
    "annee" => $newFilmDate, 
    "refimg" => $newIMG,
    "resumeF" => $newResume,
];
$cnx1=connectDb();
$reponse_insertionFilm  = $cnx1->prepare("INSERT INTO film VALUES (:id, :typeF, :idreal, :titre, :annee, :refimg, :resumeF)");
$reponse_insertionFilm ->execute($donnees);

var_dump($donnees);
?>