<?php


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 $nombre = $_POST['nombre'];
 $mailContacto = $_POST['mail'];
 $asunto= $_POST['asunto'];
 $mensaje =$_POST['mensaje'];

 


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'vps-4419599-x.dattaweb.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@grupoirupe.com.ar';                     //SMTP username
    $mail->Password   = 'OaBHR@*4sX';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@grupoirupe.com.ar', 'GrupoIrupe');
    $mail->addAddress('info@grupoirupe.com.ar');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Nombre: " . $nombre . ", Mail: " . $mailContacto . ", Asunto: " . $asunto;
    $mail->Body    = $mensaje;
    

    $mail->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

























//-------------------- primer intento (no funciona)
// if($_SERVER['REQUEST_METHOD'] != 'POST')
// {
//     header("location: ../html/contacto.html");
// }

// require '../PHPMailer/PHPMailer.php';
// require '../PHPMailer/Exception.php';
 
// use PHPMailer\PHPMailer\PHPMailer;




// $mailer = new PHPMailer();
// $mailer->setFrom( $mail, "$nombre");
// $mailer->addAddress('ianigroj@gmail.com', 'sitio web');
// $mailer->Subject = "Mensaje web: $asunto";
// $mailer->msgHTML($body);
// $mailer->AltBody = strip_tags($body);
// $rta = $mailer->send();

// var_dump($rta);



