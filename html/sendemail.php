<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

//Load Composer's autoloader
require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.cipnet.com.br';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contato@vaerdigital.com.br';                     //SMTP username
    $mail->Password   = 'fZ1eY2eD';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contato@vaerdigital.com.br', 'Contato Site');
    $mail->addAddress('contato@vaerdigital.com.br', 'Guilherme Farias');     //Add a recipient
    $mail->addAddress('contato@vaerdigital.com.br');               //Name is optional
    $mail->addReplyTo('contato@vaerdigital.com.br', 'Information');
    $mail->addCC('contato@vaerdigital.com.br');
    $mail->addBCC('contato@vaerdigital.com.br');

    //Content
    $mail->isHTML(true);     
    $mail->Subject  = "dsf";                           
    $mail->Body    = "Nome: ".$name. "\n <br>".
   "Email: ".$email. "\n <br>".
    "Mensagem: ".$message;

    $mail->send();
    
    echo "deu certo";
} catch (Exception $e) {
    echo "deu errado";
}