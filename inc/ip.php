<?php
//Criado por @hackergaucho
//v0.1.0 14nov2028 procedural
//v1.0.0 10jun2021 funcional com comentários

$ip=function () {
    $ip=false;
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];//cloudflare
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];//acesso direto
    }
    return $ip;
};
return $ip();
