<?php

Namespace Xx\Model;

Class Transaction {
    public function GetByID($id, $userID)
    {
        global $connection;
        $cols = [
            "*"
        ];

        return $connection->select(
            "AccountingTransactions",
            $cols,
            "WHERE tbl.ID = $id AND (InitiatorID = $userID OR ReceiverID = $userID)",
            $join
        );
    }
    
    public function GetAll($userID)
    {
        global $connection;
        $cols = [
            "*"
        ];

        return $connection->select(
            "AccountingTransactions",
            $cols,
            "WHERE InitiatorID = $userID OR ReceiverID = $userID",
            $join
        );
    }

    public function Create($Status, $PSID, $InitiatorID, $ReceiverID, $Amount, $Curr, $Card, $Description, $Type, $PayMethod) {
        global $connection;
        $data = [
            "Status" => $Status,
            "PaymentSID" => $PSID,
            "InitiatorID" => $InitiatorID,
            "ReceiverID" => $ReceiverID,
            "Amount" => $Amount,
            "Currency" => $Curr,
            "Card" => $Card,
            "Description" => $Description,
            "Type" => $Type,
            "PaymentMethod" => $PayMethod
        ];
        $connection->insert("AccountingTransactions", $data);
        print_r($data);
        return $connection->id();
    }

    public function Update($id, $Status, $PSID, $InitiatorID, $ReceiverID, $Amount, $Curr, $Card, $Description, $Type, $PayMethod) {
        global $connection;
        $data = [
            "Status" => $Status,
            "PaymentSID" => $PSID,
            "InitiatorID" => $InitiatorID,
            "ReceiverID" => $ReceiverID,
            "Amount" => $Amount,
            "Currency" => $Curr,
            "Card" => $Card,
            "Description" => $Description,
            "Type" => $Type,
            "PaymentMethod" => $PayMethod
        ];
        $connection->update("AccountingTransactions", $data, "WHERE ID = ".$id);
        return $connection->id();
    }

}
?>