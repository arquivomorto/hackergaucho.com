<?php
//Criado por @hackergaucho
//v0.1.0 15jun2021

return function ($language) {
    //ISO-639
    $str=file_get_contents(__DIR__.'/languages.json');
    $arr=json_decode($str, true);
    if (@$arr[$language]) {
        return $arr[$language]['name'];
    } else {
        return false;
    }
};
