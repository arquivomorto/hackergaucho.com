#!/bin/bash
touch db/db.db
sudo chmod 777 db/db.db
php bin/mig.php
echo "pronto!"
