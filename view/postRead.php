<?php
$title=$post['title'];
require 'header.php';
?>
<div style="width:600px;margin:0 auto;text-align:left;max-width:100%;">
    <?php
    require 'top.php';
    ?>
    <p class="center">
        <b>
            <?php print date("d.M.Y", $post['createdAt']); ?>
        </b>
    </p>
    <hr>
    <?php
    if ($isAuth()) {
        ?>
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
            <a href="<?php print SITE_URL; ?>logout.php">Sair</a>
        </p>
        <?php
    }//fim do código autenticado
    ?>
    <div class="post">
    <?php
    print nl2br($post['post']);
    ?>
    </div><!--post-->
    <hr>
    <?php 
    //require 'compartilhar.php';
    require 'nav.php';
    ?>
    </div><!--container-->
