<?php
// incs
$db=require INC.'db.php';
$country2language=require INC.'country2language.php';
// vars
$url=$_SERVER["REQUEST_SCHEME"].'://';
$url.=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$url=htmlentities($url);
$ip=require INC.'ip.php';
$mail=require INC.'mail.php';
$ua=require INC.'ua.php';

$ua=$ua();

$where=[
    'ip'=>$ip
];
$country=$db->get('ip', 'country', $where);
// verificar se o ip existe
if ($country) {
    $language=$country2language($country);
} else {
    $ipType=require INC.'ipType.php';
    $ip2country=require INC.'ip2country.php';
    $country=$ip2country($ip);
    $language=$country2language($country);
    // salva o ip
    $data=[
        'ip'=>$ip,
        'type'=>$ipType($ip),
        'country'=>$country,
        'createdAt'=>time(),
        'language'=>$language
    ];
    $db->insert("ip", $data);
}

$method=null;
if (@!empty($ua['method'])) {
    $method=PHP_EOL.'<b>método:</b>'.PHP_EOL;
    $method.=$ua['method'].PHP_EOL;
}

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


$data= date("dMY H:i:s", time());

$client='Desconhecido';
if (!empty($ua['client'])) {
    $client=$ua['client'];
}

$rawClient=@$_SERVER['HTTP_USER_AGENT'];

$hostDoIp=gethostbyaddr($ip);

$usuario=@$_POST['email'];

$body=<<<heredoc
<b>usuário:</b>
{$usuario}

<b>data e hora da visita:</b>
{$data}
{$method}
<b>url visitada:</b>
{$url}
{$referer}
<b>ip do visitante:</b>
{$ip}

<b>host do ip:</b>
{$hostDoIp}

<b>user agent:</b>
{$ua['client']}
{$os}
<b>user-agent (raw):</b>
{$rawClient}

<b>tipo:</b>
{$ua['type']}
heredoc;
$body=nl2br($body);
$country2name=require INC.'country2name.php';
$country=$country2name($country);
$language2name=require INC.'language2name.php';
$language=$language2name($language);
$subject=$client.' '.$country.'/'.$language.' ('.$ip.')';
$to=MAIL_FROM;
if ($ua['type']<>'bot') {
    if(MAIL_AFTER_SIGNIN){
        $mail($body, $subject, $to);
    }
}
