<div class="top">
    <!--<a class="imageHover"
    href="<?php print SITE_URL; ?>"
    title="<?php print SITE_NAME; ?>">
    <?php
    $src=SITE_URL.'img/logo_white_150px.png';
    ?>
    <img src="<?php print $src; ?>" width="150" height="150"
    alt="<?php print SITE_NAME; ?>"></a>-->
    <center>
    <?php
    if($title<>SITE_NAME){  
    ?>
    <a class="imageHover"
    href="<?php print SITE_URL; ?>"
    title="<?php print SITE_NAME; ?>">
    <?php  
        print '<h1>'.SITE_NAME.'</h1></a>';        
        print '<h2>'.$title.'</h2>';
    }else{
        print '<h1>'.SITE_NAME.'</h1>';    
    }        
    ?>
    </center>
</div>
