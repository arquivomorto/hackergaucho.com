<?php
require 'cfg.php';
$method=$_SERVER["REQUEST_METHOD"];
$error=false;
if ($method == 'POST') {
    // vars
    $normal=require INC.'normal.php';
    $valid=require INC.'valid.php';
    $post=$_POST['post'];
    $title=@$_POST['title'];
    // normalizar o post
    $data['title']=$normal($title, 'singleLineString');
    $data['post']=trim($post);
    //validar o post
    $rules=[
        'title'=>[
            'minLength'=>1,
            'maxLength'=>50,//SEO Google
            'message'=>'O título precisa ter entre 1 e 50 caracteres'
        ],
        'post'=>[
            'minLength'=>1,
            'maxLength'=>1024,
            'message'=>'O post precisa ter entre 1 e 1024 caracteres'
        ]
    ];
    $error=$valid($data, $rules);
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
            $url=SITE_URL.'blog/'.$slug($data['title']).'/'.$postId;
            header('Location: '.$url);
        } else {
            $error[]='Erro desconhecido ao salvar no banco de dados';
            require 'view/error.php';
        }
    }
} else {
    require 'view/postCreate.php';
}
