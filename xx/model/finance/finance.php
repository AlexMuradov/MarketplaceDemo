<?php

Namespace Xx\Model\Finance;

Class Finance {

    public function CreateInvoice($To, $By, $Due, $Ccy, $Status) {
        global $connection;
        $data = [
            "IssuedTo" => $To,
            "IssuedBy" => $By,
            "AmountDue" => $Due,
            "Currency" => $Ccy,
            "Status" => $Status
        ];
        $connection->insert("AccountingInvoices", $data);
        return $connection->id();
    }

    public function DeleteInvoice($id) {
        global $connection;
        $filter = "WHERE ID = " . $id;
        $connection->delete("AccountingInvoices", $filter);
    }

    public function RunTriggers() {

    }

    public function CreateTransaction($Status, $PSID, $InitiatorID, $ReceiverID, $Amount, $Curr) {
        global $connection;
        $data = [
            "Status" => $Status,
            "PaymentSID" => $PSID,
            "InitiatorID" => $InitiatorID,
            "ReceiverID" => $ReceiverID,
            "Amount" => $Amount,
            "Currency" => $Curr
        ];
        $connection->insert("AccountingTransactions", $data);
        return $connection->id();
    }

    public function ListTransactions($userID) {
        global $connection;
        $join = [
            "jn2" => ["AccountPersonalInfo", "AccountID", "tbl.ReceiverID"],
            "jn3" => ["AccountPersonalInfo", "AccountID", "tbl.InitiatorID"],
            "jn4" => ["AccountSecurity", "ID", "tbl.ReceiverID"],
            "jn5" => ["AccountSecurity", "ID", "tbl.InitiatorID"]
        ];
        $cols = [
            "tbl.ID",
            "tbl.Status",
            "tbl.Datestamp",
            "tbl.Currency",
            "tbl.Amount",
            "jn2.Name `ToName`",
            "jn2.Surname `ToSurname`",
            "jn2.DisplayName `ToDisplayName`",
            "jn4.Email `ToEmail`",
            "jn3.Name `ByName`",
            "jn3.Surname `BySurname`",
            "jn3.DisplayName `ByDisplayName`",
            "jn5.Email `ByEmail`"
        ];
        $result = $connection->select(
            "AccountingTransactions",
            $cols,
            "WHERE tbl.ReceiverID = " . $userID . " OR tbl.InitiatorID = " . $userID,
            $join
        );

        return $result;
    }

    public function InvoiceDetails($invoiceNR, $userID) {
        global $connection;
        $join = [
            "jn2" => ["AccountPersonalInfo", "AccountID", "tbl.InitiatorID"],
            "jn3" => ["AccountPersonalInfo", "AccountID", "tbl.ReceiverID"],
            "jn4" => ["AccountSecurity", "ID", "tbl.InitiatorID"],
            "jn5" => ["AccountSecurity", "ID", "tbl.ReceiverID"]
        ];
        $cols = [
            "tbl.ID",
            "tbl.InitiatorID",
            "tbl.ReceiverID",
            "tbl.Datestamp",
            "jn2.Name `ToName`",
            "jn2.Surname `ToSurname`",
            "jn2.DisplayName `ToDisplayName`",
            "concat(jn2.Country, ' ', jn2.City, ' ', jn2.City, ' ', jn2.Street, ' ', jn2.Building, ' ', jn2.Appartment, ' ', jn2.Zip) `ToAddress`",
            "concat(jn4.PhoneCode, jn4.Phone) `ToPhone`",
            "jn4.Email `ToEmail`",
            "jn3.Name `ByName`",
            "jn3.Surname `BySurname`",
            "jn5.Email `ByEmail`"
        ];

        return $connection->select(
            "AccountingTransactions",
            $cols,
            "WHERE tbl.ID = $invoiceNR AND (InitiatorID = $userID OR ReceiverID = $userID)",
            $join
        );
    }

    public function AccountBalance($userID) {
        global $connection;
        return $connection->select_flex(
            "SELECT 
            SUM(
                CASE
                    WHEN InitiatorID = $userID THEN
                        Amount * (-1)
                    ELSE
                        Amount
                END
            ) `Summa`
            FROM AccountingTransactions
            WHERE (InitiatorID = $userID OR ReceiverID = $userID)"
        );
    }

    public function CreateFiatAccount($userID, $number, $ccy, $name, $address) {
        global $connection;
        $vCode = rand(100000,999999);
        
        $data = [
            "AccountID" => $userID,
            "Number" => $number,
            "CCY" => $ccy,
            "HolderName" => $name,
            "HolderAddress" => $address,
            "VerificationCode" => $vCode
        ];

        $phone = $connection->select_flex("
            SELECT PhoneCode, Phone FROM `AccountSecurity` WHERE ID = $userID
        ");

        $Verify = new \Xx\Model\Auth\Verify;
        $Verify->sendPhoneVerify(
            $phone[0]['PhoneCode'].$phone[0]['Phone'],
            $vCode
        );

        return $connection->insert(
            "AccountingAccounts",
            $data
        );
    }

    public function ListFiatAccounts($userID) {
        global $connection;

        $cols = [
            "ID",
            "AccountID",
            "RIGHT(Number,4) `AccNumber`",
            "CCY",
            "HolderName",
            "HolderAddress",
            "DefaultAccount"
        ];
        return $connection->select(
            "AccountingAccounts",
            $cols,
            "WHERE AccountID = " . $userID . " AND Active = 1 ORDER BY DefaultAccount"

        );
    }

    public function DeleteFiatAccount($userID, $AccountID) {
        global $connection;

        return $connection->update(
            "AccountingAccounts",
            [
                "Active" => "0"
            ],
            "WHERE AccountID =  " . $userID . "  AND ID = " . $AccountID
        );
    }

    public function DefaultFiatAccount($userID, $AccountID) {
        global $connection;
        
        $connection->update(
            "AccountingAccounts",
            [
                "DefaultAccount" => 0 
            ],
            "WHERE AccountID = " . $userID
        );

        return $connection->update(
            "AccountingAccounts",
            [
                "DefaultAccount" => 1 
            ],
            "WHERE AccountID = " . $userID . " AND ID = " . $AccountID
        );
    }

    public function ConfirmWithdraw($accID, $amount, $pm){
        echo($accID);
        echo('/');
        echo($amount);
        echo('/');
        echo($pm);
    }
}

?>