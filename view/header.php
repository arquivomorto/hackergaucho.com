<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print htmlentities($title.' | '.SITE_NAME); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- facebook -->
    <meta property="og:image"
    content="<?php print SITE_URL; ?>img/logo.jpg" /><!--min 200x200 (fb)-->
    <meta property="og:description" content="Hacker Gaucho" />
    <!-- url canônica <meta property="og:url" content=""/> -->
    <!-- twitter -->
    <meta name="twitter:title" content="Hacker Gaucho">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image"
    content="<?php print SITE_URL; ?>img/logo.jpg">
    <meta name="twitter:site" content="@hackergaucho">
    <meta name="twitter:creator" content="@hackergaucho">
    <!-- url canônica <meta name="twitter:url" content=""> -->
    <!-- assets -->
    <?php $asset([
        "css/style.css",
        "js/jquery-3.4.1.min.js",
        "js/loadingoverlay.js",
        "js/script.js"
    ]); ?>
</head>
<body>
