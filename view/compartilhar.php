    <h3 class="center">Compartilhar</h3>
    <!-- by http://www.sharelinkgenerator.com/ -->
    <p class="center socialIcons imageHover">
        <?php
        $href='https://facebook.com/sharer/sharer.php?u=';
        $href.=urlencode($canonicalUrl);
        ?>
        <a
        href="<?php print $href; ?>"
        target="_blank"
        title="Compartilhar no Facebook"><img
        src="<?php print SITE_URL.'img/facebook.svg?v2' ?>"
        alt="Compartilhar no Facebook"></a>

        <?php
        $href='https://twitter.com/intent/tweet?text=';
        $href.=urlencode($title.' '.$canonicalUrl);
        ?>
        <a
        href="<?php print $href; ?>"
        target="_blank"
        title="Compartilhar no Twitter"><img
        src="<?php print SITE_URL.'img/twitter.svg' ?>"
        alt="Compartilhar no Twitter"></a>

        <?php
        $href='https://wa.me/?text='.urlencode($canonicalUrl);
        ?>
        <a
        href="<?php print $href; ?>"
        target="_blank"
        title="Compartilhar no Whatsapp"><img
        src="<?php print SITE_URL.'img/whatsapp.svg' ?>"
        alt="Compartilhar no Whatsapp"></a>
    </p>
