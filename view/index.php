<?php
$title='Hacker Gaucho';
require 'header.php';
?>
<div style="width:600px;margin:0 auto;text-align:left;max-width:100%;">
    <?php
    require 'top.php';
    $href=SITE_URL.'postCreate.php';
    if ($isAuth()) {
        ?>
        <center><p class="center">
            <a href="<?php print $href; ?>">Criar post</a> /
            <a href="<?php print SITE_URL; ?>logout.php">Sair</a>
        </p></center>
        <?php
    }
    print '<ul style="font-family:monospace; font-size:16px;">';
    $slug=require INC.'slug.php';
    foreach ($posts as $post) {
        $href=SITE_URL.$slug($post['title']).'/'.$post['id'].'.html';
        $text=htmlentities($post['title']);
        $date=date("dMY", $post['createdAt']);
        print '<li>'.$date.' <a href="'.$href.'">'.$text.'</a></li>';
    }
    print '</ul><center>';
    require 'nav.php'; ?></center>
</div>
