<?php
//Criado por @hackergaucho
//v0.1.0 10jun2021

require_once 'vendor/autoload.php';

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Client\Browser;
use DeviceDetector\Parser\Device\AbstractDeviceParser;

return function ($userAgent = false) {
    /*
    type=ex: browser, bot
    name=ex: Firefox, Mobile Safari, Googlebot
    os=ex: Ubuntu, iOS
    version=ex: 89.0, 11.0
    device=ex: desktop, smartphone
    */
    if (!$userAgent) {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
    }
    $dd = new DeviceDetector($userAgent);
    $dd->parse();
    $info=false;
    if ($dd->isBot()) {
        // handle bots,spiders,crawlers,...
        $arr = $dd->getBot();
        $info=[
            'name'=>@$arr['name'],
            'type'=>'bot'
        ];
    } else {
        $info['client'] = $dd->getClient();
        $info['os'] = $dd->getOs();
        $info['device'] = $dd->getDeviceName();//desktop/smartphone
        $info['brand'] = $dd->getBrandName();//marca
        $info['model'] = $dd->getModel();//modelo
        // $info=[
        //     device=ex: desktop, smartphone
        //     name=ex: Firefox, Mobile Safari, Googlebot
        //     os=ex: Ubuntu, iOS
        //     type=ex: browser, bot
        //     version=ex: 89.0, 11.0
        // ];
    }
    return $info;
};
