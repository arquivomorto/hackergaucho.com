<?php
$title='Entrar';
require 'header.php';
?>
<div style="width:600px;margin:0 auto;text-align:left;max-width:100%;">
    <?php
    require 'top.php';
    ?>
    <center>
    <form action="<?php print SITE_URL ?>signin.php"
        class="formHorizontal" method="post">
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" style="width:100%;"><br>
        <label for="password">Senha</label><br>
        <input type="password" name="password" id="password" style="width:100%;"><br><br>
        <button type="submit"><?php print $title; ?></button>
    </form>
    </center>
</div>
