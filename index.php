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
    $canonicalUrl=GITHUB_URL.'index.html';
    require 'view/index.php';
} else {
    require 'postRead.php';
}
require HELPER.'logMail.php';
