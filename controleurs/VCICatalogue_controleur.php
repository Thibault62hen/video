<?php
require("../src/VCICatalogue.php");
$requete_filmACT = showACT();
$requete_filmCOM = showCOM();
$requete_filmANI = showANI();
$requete_filmHOR = showHOR();
require("../template/VCICatalogue_vue.php");
?>