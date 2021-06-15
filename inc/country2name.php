<?php
//Criado por @hackergaucho
//v0.1.0 15jun2021

return function ($country) {
    //ISO 3166-2 to ISO-639
    $countries=file_get_contents(__DIR__.'/countries.json');
    $countriesArr=json_decode($countries, true);
    if (@$countriesArr[$country]) {
        return $countriesArr[$country]['name'];
    } else {
        return false;
    }
};
