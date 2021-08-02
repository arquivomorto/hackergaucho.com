<?php
//Criado por @hackergaucho
//v1.0.0 30mai2021 slug com remoção de diacríticos por padrão
//v1.1.0 02ago2021 lista de caracteres proibidos

return function ($str, $set = true, $removerDiacriticos = true) {
    $caracteresProibidos = [
        '!',
        '"',
        '#',
        '$',
        '%',
        '&',    
        '\'',
        '*',
        '+',
        '´',
        '-',
        '.',
        '/',
        ':',
        ';',
        '<',
        '=',
        '>',
        '?',
        '`'
    ];    
    $str=str_replace($caracteresProibidos, " ", $str);
    if ($set) {
        if ($removerDiacriticos) {
            $regex='/&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|';
            $regex.='th|tilde|uml|caron);/i';
            $str=preg_replace($regex, '$1', htmlentities($str));
        }
    } else {
        $str=str_replace('_', ' ', $str);
    }
    $str=preg_replace('/\s\s+/', ' ', $str);//remove espaços múltiplos  
    $str=str_replace(' ', '_', $str);
    $str=trim($str,'_');
    return mb_strtolower($str);
};
