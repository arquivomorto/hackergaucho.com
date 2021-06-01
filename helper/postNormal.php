<?php
return function () {
    // vars
    $normal=require INC.'normal.php';
    $post=@$_POST['post'];
    $title=@$_POST['title'];
    // normalizar o post
    $data['title']=$normal($title, 'singleLineString');
    $data['post']=trim($post);
    return $data;
};
