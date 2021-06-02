<?php
if (!defined('ERROR')) {
    die('blank space baby');
}
// vars
$db=require INC.'db.php';
$segment=require INC.'segment.php';
$section=$segment(1);
// rules
$postId=@explode('.', $segment(2))[0];
$where['id']=$postId;
$post=$db->get('post', '*', $where);
if ($post) {
    $slug=require INC.'slug.php';
    $canonicalUrl=GITHUB_URL.$slug($post['title']).'/'.$postId.'.html';
    require 'view/postRead.php';
} else {
    $error[]='Post não encontrado';
    require 'view/error.php';
}
