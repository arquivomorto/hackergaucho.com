#!/bin/bash
sudo apt install whois -y
cp -n example.cfg.php cfg.php
convert img/logo_white_favicon.png -background none -resize 32x32 -density 32x32 favicon.ico
touch db/db.db
sudo chmod 777 -R db
php bin/mig.php
echo "pronto!"
