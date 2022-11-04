<?php
require_once("config.php");
require_once("database.php");
function sendMail($data){
    $email = $data["contactEmail"];
    $phone = $data["contactPhone"];
    $obj = $data["contactObj"];
    $content = $data["contactContent"];

    $mailOK = false;
    $phoneOK = false;
    $objOK = false;
    $champsOK = false;
    $ChkObj = "/^([a-zA-ZéèÉÈç' ]{3,25}+)$/";
    $ChkPhone = "/^[0-9][0-9]{9}$/";
    if(empty($email) || empty($phone) || empty($obj) || empty($content)){
        $champsOK = false;
    }
    else{
        $champsOK = true;
    }
    //check if mail is valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $mailOK = true;
    }
    else{
        $mailOK = false;
    }
    //check if phone number is valid
    if(!preg_match($ChkPhone, $phone)){
        $phoneOK = false;
    }
    else{
        $phoneOK = true;
    }
    //check if mail object is more than 3 character
    if(!preg_match($ChkObj, $obj)){
        $objOK = false;
    }
    else{
        $objOK = true;
    }
    //everything's ok
        if($mailOK && $phoneOK && $objOK && $champsOK == true){
            $to      = "t8510080@gmail.com";
            $subject =  "".$obj."";
            $message = "De :" .$email. "\nTel : " .$phone. "\n" .$content;
            $headers = "From: ".$email. "\r\n" .
                  "Reply-To: " .$email . "\r\n" .
                  "X-Mailer: PHP/" . phpversion();
            mail($to, $subject, $message, $headers);
            echo "<h3 class='InfoValidation'>Mail envoyé<h3>";
        }
        else{
            echo "<h3 class='InfoErreur'>Erreur de l'envoie, vérifiez les champs<h3>";
        }
}
?>