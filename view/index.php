<?php
$title='Hacker Gaucho';
require 'header.php';
?>
<div class="container">
    <?php
    require 'top.php';
    $href=SITE_URL.'postCreate.php';
    if ($isAuth()) {
        ?>
        <p class="center">
            <a href="<?php print $href; ?>">Criar post</a> /
            <a href="<?php print SITE_URL; ?>logout.php">Sair</a>
        </p>
        <?php
    }
    print '<ul>';
    $slug=require INC.'slug.php';
    foreach ($posts as $post) {
        $href=SITE_URL.$slug($post['title']).'/'.$post['id'].'.html';
        $text=htmlentities($post['title']);
        print '<li><a href="'.$href.'">'.$text.'</a></li>';
    }
    print '</ul>';
    require 'nav.php'; ?>
</div>
