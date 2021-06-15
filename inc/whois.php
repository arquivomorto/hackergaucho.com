<?php
//Criado por @hackergaucho
//v0.1.0 15jun2021

return function ($ip, $whois = "whois.iana.org", $field = false) {
    $cmd='/usr/bin/whois -h '.$whois.' '.$ip;
    ob_start();
    passthru($cmd);
    $str = ob_get_contents();
    ob_end_clean();
    $arr=explode(PHP_EOL, $str);
    $return=null;
    if ($field) {
        foreach ($arr as $key => $value) {
            if (strpos($value, $field.':') !== false) {
                $return=@trim(explode(':', $value)[1]);
            }
        }
    } else {
        $return=$str;
    }
    return $return;
};
