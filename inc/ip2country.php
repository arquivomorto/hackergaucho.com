<?php
//Criado por @hackergaucho
//v0.1.0 14jun2021 com rdap e 127.0.0.1 = US
//v0.1.1 15jun2021 fix via ipfinfo dos países não encontrados
//v0.1.2 15jun2021 fix via whois dos países não encontrados

return function ($ip) {
    if ($ip=='127.0.0.1') {
        return 'US';
    } else {
        $str=@file_get_contents('https://rdap.org/ip/'.$ip);
        $country=@json_decode($str, true)['country'];
        if (empty($country)) {
            //fix via whois dos países não encontrados
            $whois=require INC.'whois.php';
            $targetWhois=$whois($ip, "whois.iana.org", 'whois');
            $country=$whois($ip, $targetWhois, 'Country');
        }
        if (empty($country)) {
            /*
            fix via ipfinfo dos países não encontrados
            US 108.62.187.64
            US 54.245.173.249
            US 52.12.64.199
            US 54.244.190.66
            */
            $details=json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
            $country=@$details->country;//ISO 3166-2
        }
        if (strlen($country)==2 and ctype_alpha($country)) {
            return $country;
        } else {
            return null;
        }
    }
};
