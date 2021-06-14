<?php
//Criado por @hackergaucho
//v0.1.0 14jun2021 com rdap e 127.0.0.1 = US

return function ($ip) {
    if ($ip=='127.0.0.1') {
        return 'US';
    } else {
        $str=@file_get_contents('https://rdap.org/ip/'.$ip);
        $country=@json_decode($str, true)['country'];
        if (strlen($country)==2 and ctype_alpha($country)) {
            return $country;
        } else {
            null;
        }
    }
};
