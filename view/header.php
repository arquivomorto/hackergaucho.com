<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print htmlentities($title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php print SITE_URL; ?>favicon.ico">
    <!-- facebook -->
    <meta property="og:image"
    content="<?php print SITE_URL; ?>img/logo_white.png" /><!--min200x200 fb-->
    <meta property="og:description" content="<?php print htmlentities($title); ?>" />
    <!-- url canônica  -->
    <meta property="og:url" content="<?php print @$canonicalUrl; ?>"/>
    <!-- twitter -->
    <meta name="twitter:description" content="<?php print htmlentities($title); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image"
    content="<?php print SITE_URL; ?>img/logo_white.png">
    <meta name="twitter:site" content="@hackergaucho">
    <meta name="twitter:creator" content="@hackergaucho">
    <!-- url canônica -->
    <meta name="twitter:url" content="<?php print @$canonicalUrl; ?>">
    <!-- assets -->
    <?php $asset([
        "css/style.css",
        "js/jquery-3.4.1.min.js",
        "js/loadingoverlay.js",
        "js/script.js"
    ]); ?>
</head>
<body>
