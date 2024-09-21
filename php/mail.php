<?php
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    header("location: ../html/contacto.html");
}

require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/Exception.php';
 
use PHPMailer\PHPMailer\PHPMailer;

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$asunto= $_POST['asunto'];
$mensaje =$_POST['mensaje'];

if ( empty(trim($nombre))) $nombre = 'Anonimo';

$body = <<<HTML
        <h1> Contacto desde la web </h1>
        <p>
            De: $nombre / $mail
        </p>        
        <h2> Mensaje</h2>
        $mensaje
        HTML;

$mailer = new PHPMailer();
$mailer->setFrom( $mail, "$nombre");
$mailer->addAddress('ianigroj@gmail.com', 'sitio web');
$mailer->Subject = "Mensaje web: $asunto";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$rta = $mailer->send();

var_dump($rta);



