<?php 
require_once("config.php");
require_once("database.php");

$cat = "";
function selectRandCarousel(){
$inputCat = array(
        "ACT",    
        "ANI",    
        "COM",    
        "HOR",       
        );
shuffle($inputCat);
$rand_CAT = array_pop($inputCat);
global $cat;
$cat = $rand_CAT;
//Set the correct categorie into $inputCatFull
if($rand_CAT == "ACT")
{
    $inputCatFull = "Action";
}
else if($rand_CAT == "ANI")
{
    $inputCatFull = "Animation";
}
else if($rand_CAT == "COM")
{
    $inputCatFull = "Comedie";
}
else if($rand_CAT == "HOR")
{
    $inputCatFull = "Horreur";
}
    return $inputCatFull;
}
function showCarousel(){
    global $cat;
    //sql request selecting 5 film by a random order from the database with the correct categorie set in a global varibale $cat
    $requete_carouselCat= connectDb2("SELECT ref_image, titre_film from film where code_type_film = '". $cat. "' ORDER BY RAND() LIMIT 5", true);
    return $requete_carouselCat;
}
?>