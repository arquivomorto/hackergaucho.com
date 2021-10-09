<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print htmlentities($title); ?></title>
    <meta name="viewport" content="width=device-width; user-scalable=0" />
    <link rel="shortcut icon" href="<?php print SITE_URL; ?>favicon.ico">
    <!-- facebook min200x200 -->
    <meta property="og:image"
    content="<?php print SITE_URL; ?>img/capa_social_2.png" />
    <meta property="og:title" content="<?php print htmlentities($title); ?>" />
    <!-- <meta property="og:description" content="<?php print SITE_NAME; ?>" /> -->
    <meta property="og:url" content="<?php print @$canonicalUrl; ?>"/>
    <!-- twitter https://cards-dev.twitter.com/validator -->
    <meta name="twitter:title" content="<?php print htmlentities($title); ?>">
    <!-- <meta name="twitter:description" content="<?php print SITE_NAME; ?>"> -->
    <!-- summary = ratio 1:1, 144x144 min, 4096x4096 max -->
    <!-- summary_large_image = ratio 2:1 300x157 min, 4096x4096 max -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image"
    content="<?php print SITE_URL; ?>img/logo_white_avatar.png">
    <meta name="twitter:site" content="@devgaucho">
    <meta name="twitter:creator" content="@devgaucho">
    <meta name="twitter:url" content="<?php print @$canonicalUrl; ?>">
    <!-- assets -->
    <?php $asset([
        //"css/style.css",
        "js/jquery-1.12.4.min.js",
        "js/loadingoverlay.js",
        "js/script.js"
    ]); ?>
</head>
<body style="text-align:center;">
