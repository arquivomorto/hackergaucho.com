<?php
//Criado por @hackergaucho
//v0.1.0 30mai2021 slug com remoção de diacríticos por padrão

return function ($str, $set = true, $removerDiacriticos = true) {
    if ($set) {
        if ($removerDiacriticos) {
            $regex='/&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|';
            $regex.='th|tilde|uml|caron);/i';
            $str=preg_replace($regex, '$1', htmlentities($str));
        }
        $str=str_replace(' ', '_', $str);
    } else {
        $str=str_replace('_', ' ', $str);
    }
    return mb_strtolower($str);
};
