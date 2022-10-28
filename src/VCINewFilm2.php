<?php 
require_once("config.php");
require_once("database.php");
require("../controleurs/VCIMenuAdmin_controleur.php");
function deleteFilm($dataDel){
    $delFilm = $dataDel["SelectedDFilm"];
    $requeteCheckLocation = "SELECT ID_FILM FROM LOCATION WHERE ID_FILM = $delFilm";
    $resultsCheckLocation = ConnectDb2($requeteCheckLocation, true);
    //if the selected film is reserved we display an error message and refresh to the previous page
    if($resultsCheckLocation){
        echo "<h3 class='InfoErreur'>Impossible, une location existe pour ce film<h3>";
        header("refresh:3;VCINewFilm_controleur.php");
    }
    //selected film is not reserved so we can delete it and refresh to the previous page
    else{
        $requeteDelete = "DELETE FROM FILM WHERE ID_FILM = $delFilm";
        $results_delete = ConnectDb2($requeteDelete, true);
        echo "<h3 class='InfoValidation'>Film supprimé<h3>";
        header("refresh:2;VCINewFilm_controleur.php");   
    }
}
function insertNewFilm($dataInsert)
{
        $validationChamps = false;
        $validationID = false;
        $validationDate = false;
        $erreur = true;
        $erreur2 = true;

        //store new film information
        $newTitre = $dataInsert["newTitre"];
        $typeFilm = $dataInsert["typeFilm"];
        $nomReal = $dataInsert["nomReal"];
        $newFilmDate = $dataInsert["newFilmDate"];
        $newIMG = $dataInsert["newIMG"];
        $newResume = $dataInsert["newResume"];
        $newYTLink = $dataInsert["newYTLink"];


        $currentDirMiniature = getcwd();
        $uploadDirMiniature = "/pictures/FilmMiniatures/'".$typeFilm."' '/' ";
        $currentDirMFull = getcwd();
        $uploadDirFull = "/pictures/FilmAffiches/'".$typeFilm."' '/' ";

      //  $uploadPathMiniature = $currentDirMiniature . $uploadDirMiniature . $fileName; 
       // $uploadPathFull = $currentDirMFull . $uploadDirFull . basename($fileName); 
        //if one or every input are empty $validationChamps stay false
        if(empty($newTitre) || empty($newFilmDate) || empty($newIMG) || empty($newResume)|| empty($newYTLink)){
            $validationChamps = false;
        }
        else{
            $validationChamps = true;
        }
        //if film date is invalid $validationDate stay false
        if(preg_match('/^[0-9]*$/', $newFilmDate)){
            $validationDate = true;
        }
        else{
            $validationDate = false;
        }
        //if both of input string and film are correct we set the first error to false
        if($validationChamps && $validationDate == true){
            $erreur = false;
        }
        else{
            echo "<h3 class='InfoErreur'>Champs incorrect<h3>";
            header("refresh:2;VCINewFilm_controleur.php");
        }
        if(!$erreur){
                $requete_checkFilm = "SELECT TITRE_FILM FROM FILM WHERE TITRE_FILM = '".$newTitre."' ORDER BY ID_FILM";
                $results_checkFilm = ConnectDb2($requete_checkFilm,true);
                //if the film doesn't exist we set the error2 to false
                if(!$results_checkFilm == $newTitre){
                    $erreur2 = false;
                }
                else{
                    echo "<h3 class='InfoErreur'>Ce film existe déjà<h3>";
                    header("refresh:2;VCINewFilm_controleur.php");
                }
                //if everything is correct we process to add the new film into the database
                if($erreur2 == false){
                    $requete_insertionFilm = "INSERT INTO film 
                    (CODE_TYPE_FILM, ID_REALIS, TITRE_FILM, ANNEE_FILM, REF_IMAGE, RESUME, YT_LINK) 
                    VALUES ('".$typeFilm."', '".$nomReal."', '".$newTitre."', '".$newFilmDate."', '".$newIMG."', '".$newResume."', '".$newYTLink."')";
                    $results_insertionFilm = ConnectDb2($requete_insertionFilm, true);
                    echo "<h3 class='InfoValidation'>$newTitre Enregistrées avec succès!<h3>";
                    header("refresh:2;VCINewFilm_controleur.php");
                }
        }
}
function insertNewReal($dataInsertReal){
    $newRealn = $dataInsertReal["newRealn"];
    $newRealp = $dataInsertReal["newRealp"];
    $requete_insertionReal = "INSERT INTO STAR (NOM_STAR, PRENOM_STAR) VALUES ('".$newRealn."', '".$newRealp."')";
    $results_insertionReal = ConnectDb2($requete_insertionReal, true);
    header("refresh:2;VCINewFilm_controleur.php");
    echo "<h3 class='InfoValidation'><h3>";
}
?>