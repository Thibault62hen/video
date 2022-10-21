<?php
require("../src/Misc_Functions.php");
require("../src/VCIResa4.php");
$dataFilmLocation["film"] = sanitize($_GET["film"]);
$dataFilmLocation["id"] = sanitize($_GET["id"]);
$dataFilmLocation["noADHERENT"] = sanitize($_POST["noADHERENT"]);
$dataFilmLocation["nomADHERENT"] = sanitize($_POST["nomADHERENT"]);
//top html structure
showTop();
//checking if the film is already reserved and process to the reservation with the post info passed to $dataFilmLocation
checkuser($dataFilmLocation);
//bottom html structure
showBottom();
?>