<?php
//Criado por @hackergaucho
//v0.1.0 24ago2018
//v1.0.0 30mai2021 função anônima; suporte ao SITE_URL

return function ($segmentId = null) {
    $str=$_SERVER["REQUEST_URI"];
    if (defined('SITE_URL')) {
        $path=parse_url(SITE_URL, PHP_URL_PATH);
        if (!is_null($path) and $path<>'/') {
            $str=substr($str, strlen($path));
        }
    }
    $str=@explode('?', $str)[0];
    $arr=explode('/', $str);
    $arr=array_filter($arr);
    $arr=array_values($arr);
    if (count($arr)<1) {
        $segment[1]='/';
    } else {
        $i=1;
        foreach ($arr as $key => $value) {
            $segment[$i++]=$value;
        }
    }
    if (is_null($segmentId)) {
        return $segment;
    } else {
        if (isset($segment[$segmentId])) {
            return $segment[$segmentId];
        } else {
            return false;
        }
    }
};
