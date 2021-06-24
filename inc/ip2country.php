<?php
//Criado por @hackergaucho
//v0.1.0 14jun2021 com rdap e 127.0.0.1 = US
//v0.1.1 15jun2021 fix via ipfinfo dos países não encontrados
//v0.1.2 15jun2021 fix via whois dos países não encontrados
//v0.1.3 24jun2021 ipinfo desabilitado

return function ($ip) {
    if ($ip=='127.0.0.1') {
        return 'US';
    } else {
        $str=@file_get_contents('https://rdap.org/ip/'.$ip);
        $country=@json_decode($str, true)['country'];
        if (empty($country)) {
            // fix via whois dos países não encontrados
            $whois=require INC.'whois.php';
            // encontra o whois adequado no whois da iana
            $whoisAdequado=$whois($ip, "whois.iana.org", 'whois');
            // fazer o pedido ao whois adequado
            $country=$whois($ip, $whoisAdequado, 'Country');
        }
        if (strlen($country)==2 and ctype_alpha($country)) {
            return $country;//ISO 3166-2
        } else {
            return null;
        }
    }
};
