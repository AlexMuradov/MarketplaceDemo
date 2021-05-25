<?php

/*require_once "/var/www/html/system/configuration.php";
require_once "/var/www/html/system/init.php";

$initialize = new Init();
$connection = new System\Db();
$connection->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

error_reporting(E_ALL);
ini_set ('display_errors', 1);

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$payload = @file_get_contents('http://ip-api.com/json/' . $ip);

$data = json_decode($payload);

print $data->countryCode;

$connection->select("DialCode");
*/
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$payload = @file_get_contents('http://api.ipstack.com/'.$ip.'?access_key=bb57470bd48ff7d60126913461579ab2&format=1');
$data = json_decode($payload);
header('Content-type: application/json; charset=utf-8');
print json_encode("+". $data->location->calling_code); 
?>