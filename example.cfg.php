<?php
define('ADMIN_EMAIL', 'admin');
define('ADMIN_PASSWORD', 'admin');
define('ERROR', true);
define('GITHUB_URL', 'https://hackergaucho.github.io/');
define('HELPER', __DIR__.'/helper/');
define('INC', __DIR__.'/inc/');
define("MAIL_FROM", 'admin@admin.com');
define('MAIL_TYPE', 'smtp');//'mail' com o postfix
define('MAIL_HOST', '127.0.0.1');
define('MAIL_PORT', '2525');//25 com o postfix
define("MAINTENANCE_MODE", 0);
define("SITE_NAME", 'Hacker Gaucho');
define('SITE_URL', 'http://root.local/');
define('ROOT', __DIR__.'/');

if (MAINTENANCE_MODE) {
    die('maitenance mode');
}

require INC.'error.php';
$asset=require INC.'asset.php';
$isAuth=require HELPER.'isAuth.php';
