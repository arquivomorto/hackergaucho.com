<?php
require 'cfg.php';
// vars
$db=require INC.'db.php';
$segment=require INC.'segment.php';
$section=$segment(1);
// rules
if ($section=='/') {
    $where=[
        'ORDER'=>['createdAt'=>'DESC']
    ];
    $posts=$db->select("post", "*", $where);
    require 'view/index.php';
}
if ($section=='blog') {
    require 'postRead.php';
}
