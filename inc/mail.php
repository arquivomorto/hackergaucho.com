<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

return function ($body, $subject, $to) {
    $mail = new PHPMailer(true);
    $mail->Mailer=MAIL_TYPE;
    $mail->SMTPAuth = false;
    $mail->SMTPDebug = 0;//2 = verbose
    $mail->Port = MAIL_PORT;
    $mail->Host = MAIL_HOST;
    $mail->setFrom(MAIL_FROM, SITE_NAME);
    $mail->addAddress($to); //email do destinatário
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    return $mail->send();
};
