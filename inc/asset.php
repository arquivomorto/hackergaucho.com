<?php
//Criado por @hackergaucho
//v0.1.0 30mai2021 suporte a SITE_URL

return function ($urls, $autoIndent = true) {
    global $cfg;
    if (is_string($urls)) {
        $arr[]=$urls;
        $urls=$arr;
    }
    foreach ($urls as $key => $url) {
        $filename=__DIR__.'/../'.$url;
        $path_parts = pathinfo($url);
        $ext=$path_parts['extension'];
        if (file_exists($filename)) {
            $md5=md5_file($filename);
            if (defined('SITE_URL')) {
                if (substr(SITE_URL, -1) == '/') {
                    $url=SITE_URL.$url."?$md5";
                } else {
                    $url=SITE_URL.'/'.$url."?$md5";
                }
            } else {
                $url=$url."?$md5";
            }
            if ($autoIndent and $key<>0) {
                print '    ';
            }
            if ($ext=='css') {
                print '<link rel="stylesheet" href="'.$url.'" />';
            }
            if ($ext=='js') {
                print '<script src="'.$url.'"></script>';
            }
            print PHP_EOL;
        }
    }
};
