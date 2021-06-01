<?php
return function ($data) {
    // vars
    $valid=require INC.'valid.php';
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
    return $valid($data, $rules);
};
