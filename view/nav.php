<p class="center">
    <?php
    if ($_SERVER["REQUEST_URI"]<>'/') {
        ?>
        <a href="<?php print SITE_URL;?>">Página principal</a>
        <?php
    }
    if (!$isAuth()) {
        if ($_SERVER["REQUEST_URI"]<>'/') {
            print '/';
        }
        ?>
        <a href="<?php print SITE_URL;?>contact">Contato</a>
        /
        <a href="<?php print SITE_URL;?>signin">Login</a>
        <?php
    }
    ?>
</p>
