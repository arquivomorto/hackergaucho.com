<?php
//Criado por @hackergaucho
//v0.1.0 30mai2021 com suporte a sqlite

require 'vendor/autoload.php';
use Medoo\Medoo;

$db=function () {
    $filename=realpath(__DIR__.'/../db/').'/db.db';
    if (file_exists($filename)) {
        return new Medoo([
            'database_type' => 'sqlite',
            'database_file' => $filename
        ]);
    } else {
        die('touch '.$filename);
    }
    return $filename;
};
return $db();
