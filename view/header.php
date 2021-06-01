<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print htmlentities($title.' | '.SITE_NAME); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $asset([
        "css/style.css",
        "js/jquery-3.4.1.min.js",
        "js/loadingoverlay.js",
        "js/script.js"
    ]); ?>
</head>
<body>
