<?php
if (!defined('ERROR')) {
    die('blank space');
}
// vars
$db=require INC.'db.php';
$segment=require INC.'segment.php';
$section=$segment(1);
// rules
$where['id']=$segment(3);
$post=$db->get('post', '*', $where);
if ($post) {
    require 'view/postRead.php';
} else {
    $error[]='Post não encontrado';
    require 'view/error.php';
}
