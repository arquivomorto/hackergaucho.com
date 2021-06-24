<?php
require '../cfg.php';
$method=$_SERVER["REQUEST_METHOD"];
if ($method=='POST') {
    $email=@$_POST['email'];
    $password=@$_POST['password'];
    if ($email===ADMIN_EMAIL and $password===ADMIN_PASSWORD) {
        $token=md5(ADMIN_PASSWORD);
        setcookie('TOKEN', $token);
        $url=SITE_URL;
        header('Location: '.$url);
    } else {
        $error[]='Dados incorretos';
        require VIEW.'error.php';
    }
} else {
    require VIEW.'signin.php';
}
require HELPER.'logMail.php';
