<?php
return function ($data) {
    // vars
    $valid=require INC.'valid.php';
    //validar o post
    $rules=[
        'email'=>[
            'minLength'=>6,
            'maxLength'=>50,//SEO Google
            'message'=>'Digite um email válido',
            'type'=>'email'
        ],
        'name'=>[
            'minLength'=>1,
            'maxLength'=>50,//SEO Google
            'message'=>'O nome precisa ter entre 1 e 50 caracteres'
        ],
        'message'=>[
            'minLength'=>1,
            'maxLength'=>1024,
            'message'=>'A mensagem precisa ter entre 1 e 1024 caracteres'
        ]
    ];
    return $valid($data, $rules);
};
