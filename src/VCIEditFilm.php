<?php 
if (isset($_POST["editFilm"])){
    $title="Validation modification film";
require("../template/headAdmin.php"); 
}
require_once("config.php");
require_once("database.php");

$requete_ListeReal = "SELECT DISTINCT ID_STAR, NOM_STAR, PRENOM_STAR FROM STAR ORDER BY ID_STAR";
$results_ListeReal = ConnectDb2($requete_ListeReal, true);

//get selected movie information
function getEditFilm($dataEdit){
    $editID = $dataEdit["SelectedDFilm"];
    $requete_editID = "SELECT ID_FILM, TITRE_FILM, ANNEE_FILM, ID_REALIS, CODE_TYPE_FILM, REF_IMAGE, RESUME, YT_LINK, NOM_STAR, PRENOM_STAR FROM FILM join star on star.ID_Star=film.ID_REALIS WHERE ID_FILM = $editID";
    $results_editID = ConnectDb2($requete_editID, false);
    return $results_editID;
}
function editSelectedFilm($dataEdit)
{
        $validImg = false;
        $erreur = true;
        //store the updated movie information
        $filmIdEdit = $dataEdit["filmIdEdit"];
        $titreEdit = $dataEdit["titreEdit"];
        $typeFilmEdit = $dataEdit["typeFilmEdit"];
        $nomRealEdit = $dataEdit["nomRealEdit"];
        $filmdateEdit = $dataEdit["filmdateEdit"];
        $resumeEdit = $dataEdit["resumeEdit"];
        $ytlinkEdit = $dataEdit["ytlinkEdit"];
        
        $fileMini = $_FILES["imgEditMini"]["name"];
        $fileMiniType = $_FILES["imgEditMini"]["type"];
        $fileMiniTmpPath = $_FILES["imgEditMini"]["tmp_name"];

        $fileCover = $_FILES["imgEditCover"]["name"];
        $fileCoverType = $_FILES["imgEditCover"]["type"];
        $fileCoverTmpPath = $_FILES["imgEditCover"]["tmp_name"];

        $currentDirMini = getcwd();
        $uploadDirMini = "\assets\pictures\FilmMiniatures\\".$typeFilmEdit."\\";
        $currentDirCover = getcwd();
        $uploadDirCover = "\assets\pictures\FilmAffiches\\".$typeFilmEdit."\\";

        $uploadPathMini = $currentDirMini . $uploadDirMini . basename($fileMini);
        $uploadPathCover = $currentDirCover . $uploadDirCover . basename($fileCover); 
        //if one or every input are empty $erreur stay false
        if(empty($titreEdit) || empty($filmdateEdit) || empty($resumeEdit)|| empty($ytlinkEdit)){
            $erreur = true;
            echo "<h3 class='InfoErreur'>Champs incorrect<h3>";
            header("refresh:2;VCINewFilm_controleur.php");
        }
        else{
            $erreur = false;
           // header("refresh:2;VCINewFilm_controleur.php");
        }
        //if image input is empty we do not change his value in database
        if(empty($fileMini || $fileCover) && !$erreur){
            $requete_editFilm = "UPDATE FILM SET CODE_TYPE_FILM = '".$typeFilmEdit."', ID_REALIS = '".$nomRealEdit."', TITRE_FILM = '".$titreEdit."'
            , ANNEE_FILM = '".$filmdateEdit."', RESUME = '".$resumeEdit."', YT_LINK = '".$ytlinkEdit."'
            WHERE ID_FILM = $filmIdEdit";
            $results_editFilm = ConnectDb2($requete_editFilm, true);
            echo "<h3 class='InfoValidation'>$titreEdit Modifié avec succès!<h3>";
            header("refresh:2;VCINewFilm_controleur.php");
        }
        else if(!empty($fileMini || $fileCover) && !$erreur){ 
            $requete_editFilm = "UPDATE FILM SET CODE_TYPE_FILM = '".$typeFilmEdit."', ID_REALIS = '".$nomRealEdit."', TITRE_FILM = '".$titreEdit."'
            , ANNEE_FILM = '".$filmdateEdit."', REF_IMAGE = '".$fileMini."', RESUME = '".$resumeEdit."', YT_LINK = '".$ytlinkEdit."'
            WHERE ID_FILM = $filmIdEdit";
            $results_editFilm = ConnectDb2($requete_editFilm, true);
            move_uploaded_file($fileMiniTmpPath,$uploadPathMini);
            move_uploaded_file($fileCoverTmpPath,$uploadPathCover);
            echo "<h3 class='InfoValidation'>$titreEdit Modifié avec succès!<h3>";
            header("refresh:2;VCINewFilm_controleur.php");
        }
}
?>