<?php

ini_set ('display_errors', 1);

require_once  '/var/www/html/system/configuration.php';
require_once  '/var/www/html/system/init.php';

$initialize = new Init();
$http_request = new System\Request();
$connection = new System\Db();
$connection->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$Autologin = new System\Autologin();

$Aggregator = new API\v1\Aggregator();

$connection->disconnect();

?>