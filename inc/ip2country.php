<?php
//Criado por @hackergaucho
//v0.1.0 14jun2021

return function ($ip) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__.'/src/whois.main.php';
    $whois = new Whois();
    $r = $whois->Lookup($ip);
    $country=@$r['regrinfo']['owner']['address']['country'];
    if (!$country) {
        $country=@$r['regrinfo']["network"]['country'];
    }
    // $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
    // $country=@$details->country;//ISO 3166-2
    if ($country) {
        return $country;
    } else {
        return 'US';//failback
    }
};
