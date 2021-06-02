<?php
$title=$post['title'];
require 'header.php';
?>
<div class="container">
    <?php
    require 'top.php';
    ?>
    <p class="center">
        <b>
            <?php print date("d.M.Y", $post['createdAt']); ?>
        </b>
    </p>
    <p class="center">
        <!-- criar post -->
        <?php
        $href=SITE_URL.'postCreate.php';
        ?>
        <a href="<?php print $href; ?>">Criar post</a> /

        <!-- editar post -->
        <?php
        $href=SITE_URL.'postUpdate.php?id='.$post['id'];
        ?>
        <a href="<?php print $href; ?>">Editar</a> /

        <!-- excluir post -->
        <?php
        $href=SITE_URL.'postDelete.php?id='.$post['id'];
        ?>
        <a onclick='return excluir("post");'
        href="<?php print $href; ?>">Excluir</a> /
        <a href="logout.php">Sair</a>
    </p>
    <?php
    print nl2br($post['post']);
    ?>
</div>
