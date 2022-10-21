<?php
require("../src/Misc_Functions.php");
require("../src/VCIResa2.php");
//retrieving all films info from the categorie selected previously and we display it in a table
$resultsFilm = getFilm();
require("../template/VCIResa2_vue.php");
?>