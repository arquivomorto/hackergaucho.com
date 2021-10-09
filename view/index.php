<?php
$title='Blog';
require 'header.php';
?>
<div style="width:640px;margin:0 auto;text-align:left;max-width:100%;">
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
    print '<ul>';
    $slug=require INC.'slug.php';
    foreach ($posts as $post) {
        $href=SITE_URL.$slug($post['title']).'/'.$post['id'].'.html';
        $text=htmlentities($post['title']);
        $date=date("d.M.Y", $post['createdAt']);
        $link='<a href="'.$href.'">'.$text.'</a>';
        print '<li>'.$date.'<br> <b>'.$link.'</b><br><br></li>';
    }
    print '</ul><center>';
    require 'nav.php'; ?></center>
</div>
