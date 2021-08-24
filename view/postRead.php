<?php
$title=$post['title'];
require 'header.php';
?>
<div style="width:600px;margin:0 auto;text-align:left;max-width:100%;">
    <?php
    require 'top.php';
    ?>
    <center>
    <p>
        <b>
            <?php print date("d.M.Y", $post['createdAt']); ?>
        </b>
    </p>
    </center>
    <hr>
    <?php
    if ($isAuth()) {
        ?>
        <center>
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
        </center>
        <?php
    }//fim do código autenticado
    function text2link(
        $str,
        $target="_blank",
        $prefix=null,
        $sufix=null,
        $onclick=null
    ) {
        //@gruber (71 chars)
        //https://mathiasbynens.be/demo/url-regex
        $regex=<<<heredoc
#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS
heredoc;
        if(!is_null($onclick)){
            $onclick='onclick="'.$onclick.'" ';
        }
        $link='<a '.$onclick.'href="'.$prefix;
        $link.='$0'.$sufix.'" target="{$target}">$0</a>';
        return preg_replace($regex,$link,$str);
    }    
    ?>
    <div class="post">
    <?php
    $postStr=$post['post'];
    $postStr=htmlentities($postStr);
    $postStr=text2link($postStr);    
    print nl2br($postStr);
    ?>
    </div><!--post-->
    <hr>
    <center>
    <?php 
    //require 'compartilhar.php';
    require 'nav.php';
    ?>
    </center>
    </div><!--container-->
