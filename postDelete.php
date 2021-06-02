<?php
require 'cfg.php';
$db=require INC.'db.php';
// verifica se o post existe
$where=[
    'id'=>@$_GET['id']
];
$postExiste=$db->has('post', $where);
if ($postExiste and $isAuth()) {
    // apaga o post
    $db->delete('post', $where);
    // redireciona para a home
    $url=SITE_URL;
    header('Location: '.$url);
} else {
    $error[]='Post não encontrado';
    require 'view/error.php';
}
