<?php
$title='Entrar';
require 'header.php';
?>
<div class="containerMedio center">
    <?php
    require 'top.php';
    ?>
    <form action="signin.php" method="post" class="formHorizontal">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="password">Senha</label><br>
        <input type="password" name="password" id="password"><br>
        <button type="submit"><?php print $title; ?></button>
    </form>
</div>
