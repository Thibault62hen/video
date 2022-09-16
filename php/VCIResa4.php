<?php require "head.php"; 
require_once "config.php";
require_once "database.php";
$cnx1=connectDb();
?>
<main>
<h1>Réservation de film</h1>
<div class="d-flex justify-content-center">
<?php
        $serveur = "localhost";
        $user= "root";
        $passwd = "root";
        $bdd = "video";
        
        try {
            $cnx = new PDO('mysql:host='.$serveur.';dbname='.$bdd, $user, $passwd);
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
        }
        
        catch (PDOException $error) {
            echo 'N° : '.$error->getCode().'<br />';
            die ('Erreur : '.$error->getMessage().'<br />');
        }

$film = $_GET["film"];
$postadh = $_POST["noADHERENT"];
$postnom = $_POST["nomADHERENT"];

$reponse = $cnx1->query('select NUM_ADHERENT, PRENOM_ADHERENT from adherent where NUM_ADHERENT = "'.$postadh.'" and PRENOM_ADHERENT = "'.$postnom.'"');
$results = $reponse->fetch(PDO::FETCH_OBJ);

$reponseloc = $cnx1->query('select film.ID_FILM, TITRE_FILM from film INNER JOIN location ON location.ID_FILM = film.ID_FILM WHERE TITRE_FILM = "'.$film.'"');
$resultsloc = $reponseloc->fetchAll(PDO::FETCH_OBJ);

$adherentOK = false;
$locationOK= false;

$postAdh = $_POST["noADHERENT"];
$postIDfilm = $_GET["id"];
$dateNow = date("Y-m-d");
$dateEnd = date("Y-m-d", strtotime("+15 day"));

$donneesResa = [
    "id" => $postAdh, 
    "postID" => $postIDfilm,
    "dateN" => $dateNow, 
    "dateE" => $dateEnd, 
];

if(!preg_match('/./', $postadh) || !preg_match('/./', $postnom)){
    echo "<h2>Champs invalide</h2></br>";
}
else if($results === false){
        echo "<h2>coordonnées incorrectes.</h2></br>";
}
else{
     $adherentOK = true;
     if(empty($resultsloc)){ 
        $cnx1=connectDb();
        $reponse_insertionResa = $cnx->prepare("insert into location (NUM_ADHERENT, ID_FILM, DEBUT_LOCATION, DATE_RETOUR) VALUES (:id, :postID, :dateN, :dateE)");
        $reponse_insertionResa->execute($donneesResa);
        echo "<h2>Merci " .$postnom. " pour votre réservation du film " .$film. "</h2></br>";
        $locationOK= true;
    }
    else{
    $locationOK= false;
    echo "<h2>film déjà réservé</h2></br>";
    }
}
if (isset($_POST["Reservation"])) {
    if($adherentOK && $locationOK == true)
    {
        
    }
}
?>
</br>
<button type="submit" class="bn632-hover bn26" onclick="history.go(-1)">Retour</button> 
</div>
</main>
<?php require "pied.php";?>