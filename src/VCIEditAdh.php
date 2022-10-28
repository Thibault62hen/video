<?php 
require_once("config.php");
require_once("database.php");
if (isset($_POST["editUser"])){
    $title="Validation modification adherent";
require("../template/headAdmin.php"); 
}
//get selected user information
function getEditUser($dataEdit){
    $editID = $dataEdit["SelectedDAdh"];
    $requete_editID = "SELECT NUM_ADHERENT, NOM_ADHERENT, PRENOM_ADHERENT, ADR_ADHERENT, ADR2_ADHERENT, CODEPOSTAL_ADHERENT,
     VILLE_ADHERENT, TEL_ADHERENT FROM ADHERENT WHERE NUM_ADHERENT = $editID";
    $results_editID = ConnectDb2($requete_editID, false);
    return $results_editID;
}
function editSelectedUser($dataEdit)
{
        $erreur = true;
        //store the updated user information
        $userIdEdit = $dataEdit["userIdEdit"];
        $nameEdit = $dataEdit["nameEdit"];
        $surnameEdit = $dataEdit["surnameEdit"];
        $adressEdit = $dataEdit["adressEdit"];
        $adress2Edit = $dataEdit["adress2Edit"];
        $PCEdit = $dataEdit["PCEdit"];
        $cityEdit = $dataEdit["cityEdit"];
        $phoneEdit = $dataEdit["phoneEdit"];
        //if one or every input are empty $erreur stay false
        if(empty($nameEdit) || empty($surnameEdit) || empty($adressEdit) || empty($PCEdit) || empty($cityEdit) || empty($phoneEdit)){
            $erreur = true;
            echo "<h3 class='InfoErreur'>Champs incorrect<h3>";
            header("refresh:2;VCINewAdh_controleur.php");
        }
        else{
            $erreur = false;
        }
        //if optional adress is empty we do not change it in the db
        if(empty($adress2Edit) && !$erreur){
            $requete_editUser = "UPDATE ADHERENT SET NOM_ADHERENT = '".$nameEdit."', PRENOM_ADHERENT = '".$surnameEdit."', ADR_ADHERENT = '".$adressEdit."'
            , CODEPOSTAL_ADHERENT = '".$PCEdit."', VILLE_ADHERENT = '".$cityEdit."', TEL_ADHERENT = '".$phoneEdit."'
            WHERE NUM_ADHERENT = $userIdEdit";
            $results_editUser = ConnectDb2($requete_editUser, true);
            echo "<h3 class='InfoValidation'>$nameEdit Modifié avec succès!<h3>";
            header("refresh:2;VCINewAdh_controleur.php");
        }
        else if(!empty($adress2Edit) && !$erreur){ 
            $requete_editUser = "UPDATE ADHERENT SET NOM_ADHERENT = '".$nameEdit."', PRENOM_ADHERENT = '".$surnameEdit."', ADR_ADHERENT = '".$adressEdit."'
            , ADR2_ADHERENT = '".$adress2Edit."', CODEPOSTAL_ADHERENT = '".$PCEdit."', VILLE_ADHERENT = '".$cityEdit."', TEL_ADHERENT = '".$phoneEdit."'
            WHERE NUM_ADHERENT = $userIdEdit";
            $results_editUser = ConnectDb2($requete_editUser, true);
            echo "<h3 class='InfoValidation'>$nameEdit Modifié avec succès!<h3>";
            header("refresh:2;VCINewAdh_controleur.php");
        }
}
?>