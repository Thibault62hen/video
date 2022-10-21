<?php
require("../src/VCIContact.php");
require("../template/VCIContact_vue.php");
if(isset($_POST["formContact"]))
{
    $dataMail["contactEmail"] = $_POST["contactEmail"];
    $dataMail["contactPhone"] = $_POST["contactPhone"];
    $dataMail["contactObj"] = $_POST["contactObj"];
    $dataMail["contactContent"] = $_POST["contactContent"];
    sendMail($dataMail);
}
?>