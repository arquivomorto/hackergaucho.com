<?php
$url=$_SERVER["REQUEST_SCHEME"].'://';
$url.=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$url=htmlentities($url);
$ip=require INC.'ip.php';
$mail=require INC.'mail.php';
$ua=require INC.'ua.php';

$ua=$ua();

$os=null;
if (@!empty($ua['os'])) {
    $os=PHP_EOL.'<b>sistema operacional:</b>'.PHP_EOL;
    $version=null;
    if (!empty($ua['osVersion'])) {
        $version=' '.$ua['osVersion'];
    }
    $os.=$ua['os'].$version.PHP_EOL;
}

$referer=null;
if (@!empty($ua['referer'])) {
    $referer=PHP_EOL.'<b>referer:</b>'.PHP_EOL;
    $referer.=htmlentities($ua['referer']).PHP_EOL;
}

$data= date("dMY h:i:s", time());

$body=<<<heredoc
<b>data e hora da visita:</b>
{$data}

<b>url visitada:</b>
{$url}
{$referer}
<b>ip do visitante:</b>
{$ip}

<b>user agent:</b>
{$ua['client']}
{$os}
<b>tipo:</b>
{$ua['type']}
heredoc;
$body=nl2br($body);
$subject=$ip.' visitou o HG';
$to=MAIL_FROM;
$mail($body, $subject, $to);
