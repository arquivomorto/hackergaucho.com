<?php
$count=count($error);
if ($count==1) {
    $title='Erro';
} else {
    $title='Erros';
}
require 'header.php';
?>
<div class="container">
    <?php
    require 'top.php';
    ?>
    <?php
    if ($count==1) {
        print '<p class="center">';
        $key=key($error);
        print $error[$key];
        print '</p>';
    } else {
        print '<ul>';
        foreach ($error as $errorMsg) {
            print '<li>'.$errorMsg.'</li>';
        }
        print '</ul>';
    }
    ?>
    <p class="center">
        <a href="javascript:window.history.back();">Voltar</a>
    </p>
</div>
