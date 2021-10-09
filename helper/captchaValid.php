<?php
$captchaValid=function($hCaptchaReponse)
{
    $data = [
        'secret' => HCAPTCHA_SECRET,
        'response' => $hCaptchaReponse
    ];
    $verify = @curl_init();
    $url='https://hcaptcha.com/siteverify';
    curl_setopt($verify, CURLOPT_URL, $url);
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($verify);
    $arr=@json_decode($response,true);
    if (@$arr['success']) {
        return true;
    } else {
        return false;
    }
};
$hCaptchaReponse=@$_POST['h-captcha-response'];
if(!$captchaValid($hCaptchaReponse)){
    $error[]='Captcha inválido';
    require VIEW.'error.php';
    die();
}
