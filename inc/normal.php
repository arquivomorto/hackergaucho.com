<?php
//Criado por @hackergaucho
//v0.1.0 31mai2021 com singleLineString
//v0.1.1 31mar2021 com funções anônimas

return function ($str, $typeKey) {
    $types=[
        //sem quebras de linha e sem espaços múltiplos
        'singleLineString'=>function ($str) {
            $str=preg_replace('/[^[:print:]]/u', ' ', $str);//apenas printáveis
            $str=preg_replace('/\s\s+/', ' ', $str);//remove espaços múltiplos
            return trim($str);
        }
    ];
    if (isset($types[$typeKey])) {
        $str=$types[$typeKey]($str);
    } else {
        die('type '.$type.' not found');
    }
    return $str;
};
