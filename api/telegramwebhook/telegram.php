<?php

Namespace API\TelegramWebhook;

Class Telegram {

    function Respond($m, $i) {
        $key = Telegram_BotKey1;
        file_get_contents("https://api.telegram.org/$key/sendMessage?chat_id=$i&text=$m");
    }

    function Listen() {
        $jsonString = json_decode(file_get_contents("php://input"), true);
        if($jsonString["message"]["text"]) {
            $reply['MSG'] = $jsonString["message"]["text"];
            $reply['ROOM'] = $jsonString["message"]["chat"]["id"];
        } else {
            $reply['MSG'] = "";
            $reply['ROOM'] = FALSE;
        }
        return $reply;
    }
}
977392993;771109126
?>