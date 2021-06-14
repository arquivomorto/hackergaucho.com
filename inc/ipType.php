<?php
//Criado por @hackergaucho
//v0.1.0 14jun2021

return function ($ip) {
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return '4';
    } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return '6';
    } else {
        return false;
    }
};
