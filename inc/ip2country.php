<?php
//Criado por @hackergaucho
//v0.1.0 14jun2021 com rdap e 127.0.0.1 = US
//v0.1.1 15jun2021 com fix do bugs nos ips americanos

return function ($ip) {
    if ($ip=='127.0.0.1') {
        return 'US';
    } else {
        $str=@file_get_contents('https://rdap.org/ip/'.$ip);
        $country=@json_decode($str, true)['country'];
        if (strlen($country)==2 and ctype_alpha($country)) {
            return $country;
        } else {
            /*
            fix do bugs nos ips americanos (precisa do ipinfo.io):
            US 108.62.187.64
            US 54.245.173.249
            US 52.12.64.199
            US 54.244.190.66
            */
            $details=json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
            $country=@$details->country;//ISO 3166-2
            if (strlen($country)==2 and ctype_alpha($country)) {
                return $country;
            } else {
                return null;
            }
        }
    }
};
