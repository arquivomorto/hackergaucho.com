<?php
require 'cfg.php';
$method=$_SERVER["REQUEST_METHOD"];
if ($method=='POST') {
    // validar o captcha
    require HELPER.'captchaValid.php';
    // enviar email de alerta
    require HELPER.'logMail.php';
    $email=@$_POST['email'];
    $password=@$_POST['password'];
    if ($email===ADMIN_EMAIL and $password===ADMIN_PASSWORD) {
        $token=md5(ADMIN_PASSWORD);
        if (setcookie('TOKEN', $token)) {
            $url=SITE_URL;
            header('Location: '.$url);
        } else {
            die("erro ao definir cookie");
        }
    } else {
        $error[]='Dados incorretos';
        require VIEW.'error.php';
    }
} else {
    require VIEW.'signin.php';
}
