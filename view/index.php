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
        <a href="<?php print $href; ?>">Criar post</a>
    </p>
    <?php
    print '<ol>';
    $slug=require INC.'slug.php';
    foreach ($posts as $post) {
        $href=SITE_URL.'blog/'.$slug($post['title']).'/'.$post['id'];
        $text=htmlentities($post['title']);
        print '<li><a href="'.$href.'">'.$text.'</a></li>';
    }
    print '</ol>';
    ?>
</div>
