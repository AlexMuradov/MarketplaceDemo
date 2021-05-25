<?php

namespace Xx\Model\Communication;

Class Notification {

    function ShowNotifications($uid) {
        global $connection;
        return $connection->select("AccountNotifications", ["*"], "WHERE AccountID = $uid AND Active = 1");
    }

}

?>