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
    }
    print nl2br($post['post']);
    ?>
    <h3>Compartilhar</h3>
    <!-- by http://www.sharelinkgenerator.com/ -->
    <p class="center shareIcons">
        <?php
        $href='https://facebook.com/sharer/sharer.php?u=';
        $href.=urlencode($canonicalUrl);
        ?>
        <a
        href="<?php print $href; ?>"
        target="_blank"
        title="Compartilhar no Facebook"><img
        src="<?php print SITE_URL.'img/facebook.svg' ?>"
        alt="Compartilhar no Facebook"></a>

        <?php
        $href='https://twitter.com/intent/tweet?text=';
        $href.=urlencode($title.' '.$canonicalUrl);
        ?>
        <a
        href="<?php print $href; ?>"
        target="_blank"
        title="Compartilhar no Twitter"><img
        src="<?php print SITE_URL.'img/twitter.svg' ?>"
        alt="Compartilhar no Twitter"></a>

        <?php
        $href='https://wa.me/?text='.urlencode($canonicalUrl);
        ?>
        <a
        href="<?php print $href; ?>"
        target="_blank"
        title="Compartilhar no Whatsapp"><img
        src="<?php print SITE_URL.'img/whatsapp.svg' ?>"
        alt="Compartilhar no Whatsapp"></a>
    </p>
    <p class="center">
        <a href="<?php print SITE_URL;?>">Página principal</a>
    </p>
</div>
