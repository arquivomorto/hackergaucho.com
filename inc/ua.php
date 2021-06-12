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
            'client'=>@$arr['name'],
            'clientVersion'=>'',
            'device'=>'',
            'os'=>'',
            'osVersion'=>'',
            'referer'=>@$_SERVER['HTTP_REFERER'],
            'type'=>'bot'
        ];
    } else {
        $info=[
            //client=ex: Firefox, Googlebot, Microsoft Edge, Mobile Safari
            'client'=>@$dd->getClient()['name'],
            //clientVersion=ex: 89.0, 11.0
            'clientVersion'=>@$dd->getClient()['version'],
            //device=ex: desktop, smartphone
            'device'=>@$dd->getDeviceName(),
            //os=ex:Windows
            'os'=>@$dd->getOs()['name'],
            //osVersion=ex:XP
            'osVersion'=>@$dd->getOs()['version'],
            'referer'=>@$_SERVER['HTTP_REFERER'],
            //type=ex: browser, bot
            'type'=>@$dd->getClient()['type']
        ];
    }
    return $info;
};
