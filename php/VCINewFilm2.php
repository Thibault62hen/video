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
$validationChamps = false;
$validationID = false;
$validationDate = false;

$erreur = false;
if (isset($_POST["nouveauFilm"])){
    
        if(empty($newID) || empty($newTitre) || empty($newFilmDate) || empty($newIMG) || empty($newResume)){
            $validationChamps = false;
            echo "non";
        }
        else{
            $validationChamps = true;
            echo "oui";
        }
        if(preg_match('/^[1-9]*$/', $newID)){
            $validationID = true;
            echo "oui";
        }
        else{
            $validationID = false;
            echo "non";
        }
        if(preg_match('/^[0-9]*$/', $newFilmDate)){
            $validationDate = true;
            echo "oui";
        }
        else{
            $validationDate = false;
            echo "non";
        }
        
        if($validationChamps && $validationID && $validationDate == true){
            $erreur = true;
        }
        if($erreur){
            echo "validation ok";
            $cnx1=connectDb();
            $reponse_insertionFilm  = $cnx1->prepare("INSERT INTO film (ID_FILM, CODE_TYPE_FILM, ID_REALIS, TITRE_FILM, ANNEE_FILM, REF_IMAGE, RESUME) VALUES (:id, :typeF, :idreal, :titre, :annee, :refimg, :resumeF)");
            $reponse_insertionFilm ->execute($donnees);
            
            var_dump($donnees);
        }
        else{
            echo "validation erreur";
        }
}
?>