<?php
$title='Contato';
require 'header.php';
?>
<div class="containerMedio center">
    <?php
    require 'top.php';
    ?>
    <form action="<?php print SITE_URL ?>contact/" class="formHorizontal"
        method="post">
        <label for="name">Nome</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email"><br>
        <label for="message">Mensagem</label><br>
        <textarea name="message" id="message" rows="4" cols="80"
        maxlength="1024"></textarea>
        <button type="submit">Enviar</button>
    </form>
</div>
