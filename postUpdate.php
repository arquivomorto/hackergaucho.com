<?php
require 'cfg.php';
$db=require INC.'db.php';
// verifica se o post existe
$postId=@$_GET['id'];
$where=[
    'id'=>$postId
];
$post=$db->get('post', '*', $where);
if ($post and $isAuth()) {
    $method=$_SERVER["REQUEST_METHOD"];
    if ($method=='POST') {
        $normalPost=require HELPER.'postNormal.php';
        $validPost=require HELPER.'postValid.php';
        $data=$normalPost();
        $error=$validPost($data);
        if ($error) {
            require 'view/error.php';
        } else {
            // atualizar post
            $data['updatedAt']=time();
            $db->update('post', $data, $where);
            $slug=require INC.'slug.php';
            $url=SITE_URL.$slug($data['title']).'/'.$postId.'.html';
            header('Location: '.$url);
        }
    } elseif ($isAuth()) {
        require 'view/postUpdate.php';
    } else {
        $url=SITE_URL;
        header('Location: '.$url);
    }
} else {
    $error[]='Post não encontrado';
    require 'view/error.php';
}
