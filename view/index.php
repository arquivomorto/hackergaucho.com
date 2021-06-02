<?php
$title='Blog';
require 'header.php';
?>
<div class="container">
    <?php
    require 'top.php';
    $href=SITE_URL.'postCreate.php';
    ?>
    <p class="center">
        <a href="<?php print $href; ?>">Criar post</a> /
        <a href="logout.php">Sair</a>
    </p>
    <?php
    print '<ul>';
    $slug=require INC.'slug.php';
    foreach ($posts as $post) {
        $href=SITE_URL.$slug($post['title']).'/'.$post['id'].'.html';
        $text=htmlentities($post['title']);
        print '<li><a href="'.$href.'">'.$text.'</a></li>';
    }
    print '</ul>';
    ?>
</div>
