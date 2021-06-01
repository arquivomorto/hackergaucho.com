<?php
$title='Editar post';
require 'header.php';
?>
<div class="container center">
    <?php
    require 'top.php';
    ?>
    <form action="postUpdate.php?id=<?php print $post['id'] ?>"
        method="post" class="formHorizontal">
        <label for="title">Título</label><br>
        <input type="text" name="title" id="title"
        value="<?php print htmlentities($post['title']); ?>"><br>
        <label for="post">Post</label><br>
        <textarea name="post" rows="8"
        id="post"><?php print htmlentities($post['post']);?></textarea><br>
        <button type="submit"><?php print $title; ?></button>
    </form>
</div>
