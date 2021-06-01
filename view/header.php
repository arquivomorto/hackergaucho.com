<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print htmlentities($title.' | '.SITE_NAME); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ****** favicons do faviconit.com ****** -->
    <link rel="shortcut icon" href="<?php print SITE_URL; ?>favicon.ico">
    <link rel="icon" sizes="16x16 32x32 64x64"
    href="<?php print SITE_URL; ?>favicon.ico">
    <link rel="icon" type="image/png" sizes="196x196"
    href="<?php print SITE_URL; ?>favicon/favicon-192.png">
    <link rel="icon" type="image/png" sizes="160x160"
    href="<?php print SITE_URL; ?>favicon/favicon-160.png">
    <link rel="icon" type="image/png" sizes="96x96"
    href="<?php print SITE_URL; ?>favicon/favicon-96.png">
    <link rel="icon" type="image/png" sizes="64x64"
    href="<?php print SITE_URL; ?>favicon/favicon-64.png">
    <link rel="icon" type="image/png" sizes="32x32"
    href="<?php print SITE_URL; ?>favicon/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16"
    href="<?php print SITE_URL; ?>favicon/favicon-16.png">
    <link rel="apple-touch-icon"
    href="<?php print SITE_URL; ?>favicon/favicon-57.png">
    <link rel="apple-touch-icon" sizes="114x114"
    href="<?php print SITE_URL; ?>favicon/favicon-114.png">
    <link rel="apple-touch-icon" sizes="72x72"
    href="<?php print SITE_URL; ?>favicon/favicon-72.png">
    <link rel="apple-touch-icon" sizes="144x144"
    href="<?php print SITE_URL; ?>favicon/favicon-144.png">
    <link rel="apple-touch-icon" sizes="60x60"
    href="<?php print SITE_URL; ?>favicon/favicon-60.png">
    <link rel="apple-touch-icon" sizes="120x120"
    href="<?php print SITE_URL; ?>favicon/favicon-120.png">
    <link rel="apple-touch-icon" sizes="76x76"
    href="<?php print SITE_URL; ?>favicon/favicon-76.png">
    <link rel="apple-touch-icon" sizes="152x152"
    href="<?php print SITE_URL; ?>favicon/favicon-152.png">
    <link rel="apple-touch-icon" sizes="180x180"
    href="<?php print SITE_URL; ?>favicon/favicon-180.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage"
    content="<?php print SITE_URL; ?>favicon/favicon-144.png">
    <meta name="msapplication-config"
    content="<?php print SITE_URL; ?>favicon/browserconfig.xml">
    <!-- ****** favicons do faviconit.com ****** -->
    <!-- facebook -->
    <meta property="og:image"
    content="<?php print SITE_URL; ?>img/logo.gif" /><!--min 200x200 (fb)-->
    <meta property="og:description" content="Hacker Gaucho" />
    <!-- url canônica <meta property="og:url" content=""/> -->
    <!-- twitter -->
    <meta name="twitter:title" content="Hacker Gaucho">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image"
    content="<?php print SITE_URL; ?>img/logo.gif">
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
