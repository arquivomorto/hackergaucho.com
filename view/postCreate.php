<?php
$title='Criar post';
require 'header.php';
?>
<div style="width:600px;margin:0 auto;text-align:left;max-width:100%;">
    <?php
    require 'top.php';
    ?>
    <form action="postCreate.php" method="post" class="formHorizontal">
        <label for="title">Título</label><br>
        <input type="text" name="title" id="title" style="width:100%;"><br>
        <label for="post">Post</label><br>
        <textarea name="post" rows="20" id="post" style="width:100%;"></textarea><br><br>
        <button type="submit"><?php print $title; ?></button>
    </form>
</div>
