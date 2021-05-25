<?php
// Telegram: RentxxBot
ini_set ('display_errors', 1);
require_once "/var/www/html/system/configuration.php";
require_once "/var/www/html/system/init.php";

$initialize = new Init();
$telegarm = new API\TelegramWebhook\Telegram();
$connection = new System\Db();
$connection->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$bot = $telegarm->Listen();

$roomID = (int)$bot['ROOM'];
$join = [
    "pl" => ["PropertyListings", "ID", "tbl.ListingID"],
    "act" => ["AccountSecurity", "ID", "pl.AccountID"],
    "adr" => ["AccountAddresses","ID", "pl.ID AND adr.Active = 1"]
];

$Result = $connection->select(
    "PropertyCalendar",
    [
        "act.TelegramID",
        "act.ID `accID`",
        "tbl.AccountID" `myID`,
        "adr.Street"
    ],
    
    "WHERE tbl.Status = 1 AND tbl.DateTo <= DATE(NOW()) AND tbl.AccountID = (Select MAX(ID) From AccountSecurity WHERE TelegramID = $roomID)",
    $join
);

$Party = $Result[0]['TelegramID'];
$PartyID = $Result[0]['actID'];
$MyID = $Result[0]['actID'];
$Street = $Result[0]['Street'];

$talker = [
    "/start" => "Добро пожаловать в Rentxx «Разговор с Хозяином» введите ваш эмаил что-бы продолжить.",
    "NotRecognized" => "Мы не можем найти ваш эмаил в списке бронирований, попробуйте еще раз или свяжитесь со службой поддержки info@rentxx.com",
    "Recognized" => "Спасибо, теперь вы можете общаться с хозяином жилья в этом чате."
];


if(filter_var($bot['MSG'], FILTER_VALIDATE_EMAIL)) {
    $validate = strtolower($bot['MSG']);
    $check = $connection->exists_flex(
        "AccountSecurity",
        "ID",
        "WHERE Email='$validate' AND TelegramID IS NULL"
    );

    if($check) {
        $data = ["TelegramID" => $roomID];
        $filter = "WHERE Email = '$validate'";
        $connection->update("AccountSecurity", $data, $filter);
        $telegarm->Respond($talker["Recognized"], $roomID);
    } else {
        $telegarm->Respond($talker["NotRecognized"], $roomID);
    }
}

if($talker[$bot['MSG']]) { 
    $telegarm->Respond($talker[$bot['MSG']], $roomID);
} else {
    $data = [
        "AcctFrom" => $MyID,
        "AcctTo" => $PartyID,
        "Message" => $talker[$bot['MSG']]
    ];
    $connection->insert("CommunicationMessages", $data);
    $telegarm->Respond("**" . $Street . "**: " . $bot['MSG'], $Party);
}
$connection->disconnect();

header('Content-Type: application/json');
print json_encode(1);
?>