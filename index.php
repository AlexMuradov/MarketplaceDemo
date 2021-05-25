<?php

// ** Xx.MVC alex@rentxx.az 
ini_set ('display_errors', 1);

require_once dirname(__FILE__) . '/system/configuration.php';
require_once dirname(__FILE__) . '/system/init.php';

$initialize = new Init();
$http_request = new System\Request();
$connection = new System\Db();
$connection->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$Autologin = new System\Autologin();

//require_once HOME . '/localization/ru.php';
//$Language = new System\Texts($lng);

if(file_exists(HOME . "/localization/" . strtolower($lng) . '.php')) 
{
    $langClass = "Localization\\" . strtolower($lng);
    $Language = new $langClass;
} else {
    $langClass = "Localization\\" . strtolower(DEFAULT_LANGUAGE);
    $Language = new $langClass;
}

$_Controller = str_replace(".", "/", $http_request->_Request[2]);

if(file_exists(HOME . '/xx/page/' . strtolower($_Controller) . '.php')) 
{
    $c = "Xx\Page\\" . str_replace(".", "\\", $http_request->_Request[2]);
    $j = new $c;
} else {
    $j = new Xx\Page\Home();
}

$connection->disconnect();

?>