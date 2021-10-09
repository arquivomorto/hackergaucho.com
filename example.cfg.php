<?php
define('ADMIN_EMAIL', 'admin');
define('ADMIN_PASSWORD', 'admin');
define('ERROR', true);
define('GITHUB_URL', 'https://hackergaucho.github.io/');
define('HELPER', __DIR__.'/helper/');
define('HCAPTCHA_KEY','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
define('HCAPTCHA_SECRET','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('INC', __DIR__.'/inc/');
define('MAIL_AFTER_SIGNIN', false);
define("MAIL_FROM", 'admin@admin');
define('MAIL_TYPE', 'smtp');//'mail' com o postfix
define('MAIL_HOST', '127.0.0.1');
define('MAIL_PORT', '2525');//25 com o postfix
define("MAINTENANCE_MODE", 0);
define("SITE_NAME", '@devgaucho');
define('SITE_WIDTH_LARGE', '640px');
define('SITE_WIDTH_SMALL', '295px');
define('SITE_URL', 'http://localhost/hg/');
define('ROOT', __DIR__.'/');
define('VIEW', __DIR__.'/view/');

if (MAINTENANCE_MODE and php_sapi_name()<>'cli') {
    die('maitenance mode');
}

require INC.'error.php';
$asset=require INC.'asset.php';
$isAuth=require HELPER.'isAuth.php';
