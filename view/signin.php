<?php
$title='Entrar';
require 'header.php';
?>
<div style="width:<?php print SITE_WIDTH_SMALL; ?>;margin:0 auto;text-align:left;max-width:100%;">
    <?php
    require 'top.php';
    ?>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <center>
        <form action="<?php print SITE_URL ?>signin.php"
            class="formHorizontal" method="post">
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" style="width:100%;"><br>
            <label for="password">Senha</label><br>
            <input type="password" name="password" id="password" style="width:100%;"><br>
            <label for="captcha">Captcha</label>
            <div id="capcha" class="h-captcha" data-sitekey="<?php print HCAPTCHA_KEY; ?>"></div>
            <button type="submit"><?php print $title; ?></button>
        </form>
    </center>
</div>
