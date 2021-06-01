#!/bin/bash
touch db/db.db
sudo chmod 777 db/db.db
convert img/logo.png -background none -resize 32x32 -density 32x32 favicon.ico
php bin/mig.php
echo "pronto!"
