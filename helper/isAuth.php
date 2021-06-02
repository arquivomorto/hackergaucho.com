<?php
return function () {
    if (isset($_COOKIE['TOKEN']) and $_COOKIE['TOKEN']==md5(ADMIN_PASSWORD)) {
        return true;
    } else {
        return false;
    }
};
