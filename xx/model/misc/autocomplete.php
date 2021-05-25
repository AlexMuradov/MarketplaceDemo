<?php

Namespace Xx\Model\Misc;

Class Autocomplete {

    Public Function City($Data, $Limit) {
        global $connection;
        return $connection->select(
            "SettingLocalization", 
            ["ID", "LocID", "City"], 
            "WHERE City LIKE '$Data%' LIMIT $Limit"
        );

    }

    Public Function GetCity($Id) {
        global $connection;
        return $connection->select(
            "SettingLocalization", 
            ["City"], 
            "WHERE ID = '$Id'"
        );
    }
}

?>