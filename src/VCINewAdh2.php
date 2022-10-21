<?php 
require_once("config.php");
require_once("database.php");
require("../controleurs/VCIMenuAdmin_controleur.php");
function deleteAdh($dataDel2){
    $delAdh = $dataDel2["SelectedDAdh"];
    $requeteCheckAdh = "SELECT NUM_ADHERENT FROM LOCATION WHERE NUM_ADHERENT = $delAdh";
    $results_CheckAdh = ConnectDb2($requeteCheckAdh, true);
    //if the selected user have reserved film we display an error message and refresh to the previous page
    if($results_CheckAdh){
        echo "<h3 class='InfoErreur'>Impossible, Une location existe pour cet adherent<h3>";
        header("refresh:3;VCINewAdh_controleur.php");
    }
    //user doesn't have any reserved film so we can delete him and refresh to the previous page
    else{
        $requeteNomAdh = "SELECT NOM_ADHERENT FROM ADHERENT WHERE NUM_ADHERENT = $delAdh";
        $results_NomAdh = ConnectDb2($requeteNomAdh, true);
        $nomAdh = $results_NomAdh[0];
        $requeteDelete2 = "DELETE FROM ADHERENT WHERE NUM_ADHERENT = $delAdh";
        $results_delete2 = ConnectDb2($requeteDelete2, true);
        echo "<h3 class='InfoValidation'>L'adherent $nomAdh[0] a été supprimé<h3>";
        header("refresh:2;VCINewAdh_controleur.php");
    }
}
function insertNewAdh($dataInsert2)
{
        $validationChamps2 = false;
        $validationName = false;
        $validationCP = false;
        $erreur = true;
        $erreur2 = true;
        $newNom = $dataInsert2["newNom"];
        $newPrenom = $dataInsert2["newPrenom"];
        $newAdresse = $dataInsert2["newAdresse"];
        $newAdresse2 = $dataInsert2["newAdresse2"];
        $newCP = $dataInsert2["newCP"];
        $newVille = $dataInsert2["newVille"];
        $newTel = $dataInsert2["newTel"];
        date_default_timezone_set("Europe/Paris");
        $dateNow = date("Y-m-d H:i:s");
        //if one or every input are empty $validationChamps stay false
        if(empty($newNom) || empty($newPrenom) || empty($newAdresse) || empty($newCP) || empty($newVille)){
            $validationChamps = false;
        }
        else{
            $validationChamps = true;
        }
        //if the postal code is invalide $validationCP stay false
        if(preg_match("~^[0-9]{5}$~", $newCP)){
            $validationCP = true;
        }
        else{
            $validationCP = false;
        }
        //if both of input string and postal code are correct we set the first error to false
        if($validationChamps && $validationCP == true){
            $erreur = false;
        }
        else{
            echo "<h3 class='InfoErreur'>Champs incorrect<h3>";
            header("refresh:2;VCINewAdh_controleur.php");
        }
        if(!$erreur){
                $requete_checkAdh = "SELECT NOM_ADHERENT FROM ADHERENT WHERE NOM_ADHERENT = '".$newNom."'";
                $results_checkAdh = ConnectDb2($requete_checkAdh,true);
                //if the user info doesn't exist we set the error2 to false
                if(!$results_checkAdh == $newNom){
                    $erreur2 = false;
                }
                else{
                    echo "<h3 class='InfoErreur'>Cet adherent existe déjà<h3>";
                    header("refresh:2;VCINewAdh_controleur.php");
                }
                //if everything is correct we process to add the new user into the database
                if($erreur2 == false){
                    $requete_insertionAdh = "INSERT INTO ADHERENT 
                    (NOM_ADHERENT, PRENOM_ADHERENT, ADR_ADHERENT, ADR2_ADHERENT, CODEPOSTAL_ADHERENT, VILLE_ADHERENT, TEL_ADHERENT, DATE_ADHESION) 
                    VALUES ('".$newNom."', '".$newPrenom."', '".$newAdresse."', '".$newAdresse2."', '".$newCP."', '".$newVille."', '".$newTel."', '".$dateNow."')";
                    $results_insertionAdh = ConnectDb2($requete_insertionAdh, true);
                    echo "<h3 class='InfoValidation'>$newNom Enregistrés avec succès!<h3>";
                    header("refresh:2;VCINewAdh_controleur.php");
                }
        }
}
?>