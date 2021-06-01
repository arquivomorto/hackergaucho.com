<?php
$title='Criar post';
require 'header.php';
?>
<div class="container center">
    <?php
    require 'top.php';
    ?>
    <form action="postCreate.php" method="post" class="formHorizontal">
        <label for="title">Título</label><br>
        <input type="text" name="title" id="title"><br>
        <label for="post">Post</label><br>
        <textarea name="post" rows="8" id="post"></textarea><br>
        <button type="submit"><?php print $title; ?></button>
    </form>
</div>
