<?php
//Criado por @hackergaucho
//v0.1.0 30mai2021 com suporte a ERROR

if (defined('ERROR')) {
    $show=ERROR;
} else {
    $show=true;
}
if ($show) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}
