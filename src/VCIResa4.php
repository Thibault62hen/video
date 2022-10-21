<?php 
require("../template/head.php"); 
require_once("config.php");
require_once("database.php");

function showTop(){
        echo "<h1>Réservation de film</h1>
        <div class='d-flex justify-content-center text-center flex-column'>";
}
$adherentOK = false;
$locationOK= false;
function checkUser($dataFilmLocation){
        $postIDfilm = $dataFilmLocation["id"];
        $film = $dataFilmLocation["film"];
        $postAdh = $dataFilmLocation["noADHERENT"];
        $postNom = $dataFilmLocation["nomADHERENT"];
        //check adherent sql request
        $requeteAdherent = "select NUM_ADHERENT, PRENOM_ADHERENT from adherent where NUM_ADHERENT = '".$postAdh."' and PRENOM_ADHERENT = '".$postNom."'";
        $resultsAdherent = ConnectDb2($requeteAdherent, false);
        //check film reservation sql request
        $requeteLoc = "select film.ID_FILM, TITRE_FILM from film INNER JOIN location ON location.ID_FILM = film.ID_FILM WHERE TITRE_FILM = '".$film."'";
        $resultsLoc = ConnectDb2($requeteLoc, false);
        //displaying error message if input are invalid
        if(!preg_match('/./', $postAdh) || !preg_match('/./', $postNom)){
                echo "<h3 class='InfoErreur'>Champs invalide</h3></br>";
        }
        //displaying error message if the user is not existing
        else if($resultsAdherent === false){
                echo "<h3 class='InfoErreur'>coordonnées incorrectes.</h3></br>";
        }
        else{
             $adherentOK = true;
             //if there is no reservation for the selected film we proceed to add one for this film
             if(empty($resultsLoc)){ 
                $dateNow = date("Y-m-d"); //date of today
                $dateEnd = date("Y-m-d", strtotime("+15 day")); //date when the user reservation end
                //new reservation sql request with the adherent data and correct date
                $reponse_insertionResa = "insert into location (NUM_ADHERENT, ID_FILM, DEBUT_LOCATION, DATE_RETOUR) VALUES ('".$postAdh."', '".$postIDfilm."', '".$dateNow."', '".$dateEnd."')";
                $resultInsertionResa = ConnectDb2($reponse_insertionResa, true);
                echo "<h3 class='InfoValidation'>Merci " .$postNom. " pour votre réservation du film " .$film. "</h3></br>";
                $locationOK= true;
            }
            //if the film has already a reservation
            else{
            $locationOK= false;
            echo "<h3 class='InfoErreur'>Ce film a déjà été réservé</h3></br>";
            }
        }
}
function showBottom(){
        echo "<button type='submit' class='bn632-hover bn26 mx-auto' onclick='history.go(-1)'>Retour</button> 
        </div>";
}
require("../template/footer.php");
?>