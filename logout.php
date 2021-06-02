<?php
require 'cfg.php';
if (isset($_COOKIE['TOKEN'])) {
    setcookie("TOKEN", "", time() - 3600);
}
$url=SITE_URL;
header('Location: '.$url);
