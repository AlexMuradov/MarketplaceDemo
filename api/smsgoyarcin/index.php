<?php

ini_set ('display_errors', 1);
require_once "/var/www/html/system/configuration.php";
require_once "/var/www/html/system/init.php";

$initialize = new Init();
$connection = new System\Db();
$connection->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

Class Goyarcin {

    public function Broadcast($key) {
        global $connection;
        $this->template_dir = "/var/www/html/api/smsgoyarcin/templates/";
        $API_KEY = $key;
        $this->result = $connection->select(
            "SMSAPI",
            ["*"],
            "WHERE Status = 0 AND API_KEY = '$API_KEY'"
        );

        $payload = [];

        if($this->result) {

            foreach($this->result as $k1 => $result) {
                $tex = file_get_contents($this->template_dir . $result['TemplateID'] . ".tpl");
                $x = explode(",", $result['Variables']);
                foreach ($x as $k => $tag) {
                    $tex = str_replace("{{".$k."}}", $tag , $tex);
                }
                $payload[$k1] = [
                    "num" => $result['Number'],
                    "msg" => $tex,
                    "msg_id" => $result['ID']
                ]; 
            }
        }
        return $payload;
    }

    public function Status($id) {
        global $connection;
        $connection->update(
            "SMSAPI",
            ["Status" => 1],
            "WHERE ID = $id"
        );
        return TRUE;
    }
}

if(!isset($_GET['key'])) exit;

$j = new Goyarcin;
if(isset($_GET['success'])) { 
    $j->Status($_GET['success']);
    exit;
}
$Broadcast = $j->Broadcast((int)$_GET['key']);
header('Content-type: application/json; charset=utf-8');
print json_encode($Broadcast);
?>