<?php
return function () {
    // vars
    $normal=require INC.'normal.php';
    $name=@$_POST['name'];
    $email=@$_POST['email'];
    $message=@$_POST['message'];
    // normalizar o post
    $data['name']=$normal($name, 'singleLineString');
    $data['email']=$normal($email, 'lower');
    $data['message']=trim($message);
    return $data;
};
