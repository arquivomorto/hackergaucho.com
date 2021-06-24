<?php
//Criado por @hackergaucho
//v0.1.0 10jun2021

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

return function ($body, $subject, $to, $fromName = false, $fromMail = false) {
    $mail = new PHPMailer(true);
    $mail->Mailer=MAIL_TYPE;
    $mail->SMTPAuth = false;
    $mail->SMTPDebug = 0;//2 = verbose
    $mail->Port = MAIL_PORT;
    $mail->Host = MAIL_HOST;
    if ($fromName and $fromMail) {
        $mail->setFrom($fromMail, $fromName);
    } else {
        $mail->setFrom(MAIL_FROM, SITE_NAME);
    }
    $mail->addAddress($to); //email do destinatário
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = utf8_decode($body);
    return $mail->send();
};
