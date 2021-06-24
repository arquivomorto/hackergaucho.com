<?php
require '../cfg.php';
$method=$_SERVER["REQUEST_METHOD"];
if ($method=='POST') {
    $contactNormal=require HELPER.'contactNormal.php';
    $contactValid=require HELPER.'contactValid.php';
    $data=$contactNormal();
    $error=$contactValid($data);
    $mail=require INC.'mail.php';
    $body=$data['message'];
    $subject='Contato do site';
    $to=MAIL_FROM;
    $fromName=$data['name'];
    $fromMail=$data['email'];
    if (!$error and
    $mail($body, $subject, $to, $fromName = false, $fromMail = false)) {
        // mensagem enviada
        $msg='Mensagem enviada';
        require VIEW.'success.php';
    } else {
        // erro
        if (!$error) {
            $error[]='Erro desconhecido ao enviar a mensagem';
        }
        require VIEW.'error.php';
    }
} else {
    require VIEW.'contact.php';
}
