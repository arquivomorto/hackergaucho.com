<?php
require 'cfg.php';
$method=$_SERVER["REQUEST_METHOD"];
$error=false;
if ($method == 'POST' and $isAuth()) {
    $normalPost=require HELPER.'postNormal.php';
    $validPost=require HELPER.'postValid.php';
    $data=$normalPost();
    $error=$validPost($data);
    if ($error) {
        require 'view/error.php';
    } else {
        // criar post
        // vars
        $db=require INC.'db.php';
        $data['createdAt']=time();
        $data['draft']='0';
        // rules
        $db->insert('post', $data);
        $postId=$db->id();
        if ($postId) {
            $slug=require INC.'slug.php';
            $url=SITE_URL.$slug($data['title']).'/'.$postId.'.html';
            header('Location: '.$url);
        } else {
            $error[]='Erro desconhecido ao salvar no banco de dados';
            require 'view/error.php';
        }
    }
} elseif ($isAuth()) {
    require 'view/postCreate.php';
} else {
    $url=SITE_URL;
    header('Location: '.$url);
}
