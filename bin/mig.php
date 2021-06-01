<?php
require './cfg.php';
$db=require INC.'db.php';
$migrate=require INC.'migrate.php';
$tableFolder=ROOT.'table';
$migrate($db, $tableFolder);
