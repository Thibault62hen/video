<?php
require("../src/VCIResa.php");
//retrieving all film categorie available and we display it in a select tag
$resultsTYPEF = showTypeFilm();
require("../template/VCIResa_vue.php");
?>