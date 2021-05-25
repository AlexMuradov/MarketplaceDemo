<?php
header('Content-type: application/json; charset=utf-8');
//header("Content-length: 500");
$var = file_get_contents("https://nokey.app/service/door/status.json");
print $var;
?>