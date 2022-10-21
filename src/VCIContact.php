<?php
require_once("config.php");
require_once("database.php");

function sendMail($data){
    $email = $data["contactEmail"];
    $phone = $data["contactPhone"];
    $obj = $data["contactObj"];
    $content = $data["contactContent"];

    $to      = "VladimirPoutine@blyat.ru";
    $subject =  "".$obj."";
    $message = "Tel : " .$phone. "\n" .$content;
    $headers = "From: ".$email. "\r\n" .
              "Reply-To: " .$email . "\r\n" .
              "X-Mailer: PHP/" . phpversion();
    mail($to, $subject, $message, $headers);
}
?>