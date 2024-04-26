<?php 

/* ESTO ES PARA SOLO UNA PERSONA
$to = "jhoncarranza1@outlook.es";
$subject = "mail de prueba";
$message= file_get_contents('template.html');
$headers = "From: chelecarranza1@gmail.com ";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to,$subject,$message,$headers);
echo "mail enviado"; */

//ESTO ES PARA VARIAS PERSONAS
$to = ["jhoncarranza1@outlook.es", "chelecarranza1@gmail.com"];
$subject = "mail de prueba";
$message= file_get_contents('template.html');
$headers = "From: chelecarranza1@gmail.com ";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

foreach($to as $variable_random){
    for ($i = 0; $i < 3 ; $i++) {
        mail($variable_random,$subject,$message,$headers);
    }
}

echo "mail enviado";


?>