<?php

Namespace Xx\Model\Communication;
Use Xx\Model\Misc as ModelMisc; 

Class Message Extends ModelMisc\Upload {

    public function Send($From, $To, $Message, $Image = 0) {
        global $connection;
        $data = [
            "AccFrom" => $From, 
            "AccTo" => $To,
            "Message" => $Message,
            "Image" => $Image
        ];
        $connection->insert("CommunicationMessages", $data);
        return true;
    }

    public function Inbox($To) {
        global $connection;

        return $connection->select_flex("
        SELECT 
        TB1.RECIEVER `accs`,
        cm.Message,
        cm.Status,
        cm.DateCreated,
        ap.Name,
        ap.Surname,
        CASE WHEN cm.DateCreated >= (NOW() - INTERVAL 15 MINUTE) 
        THEN 1
        ELSE 0 END `OnlineStatus`
        FROM (
            SELECT MAX(ID) AS ID, RECIEVER FROM
            (SELECT ID, AccTo AS ME, AccFrom AS RECIEVER FROM CommunicationMessages WHERE AccTo = $To
            UNION ALL
            SELECT ID, AccFrom AS ME, AccTo AS RECIEVER FROM CommunicationMessages WHERE AccFrom = $To
            ) AS TB1
            GROUP BY RECIEVER  
        ) AS TB1 
        LEFT JOIN AccountPersonalInfo ap on ap.AccountID = TB1.RECIEVER
        LEFT JOIN CommunicationMessages cm on cm.ID = TB1.ID
        ");

    }

    public function mAttach($file, $name, $folder, $type, $from, $to, $filename) {
        $this->Send($from, $to, $filename, 1);
        parent::Attach($file, $name, $folder, $type);
    }

    public function Read($From, $To) {
        global $connection;

        $join = [
            "jn1" => ["AccountPersonalInfo", "AccountID", "AccFrom"]
        ];

        $select = [
            "tbl.ID",
            "tbl.AccFrom",
            "tbl.AccFrom",
            "tbl.AccTo",
            "tbl.DateCreated",
            "tbl.Message",
            "jn1.Name",
            "jn1.Surname"
        ];

        return $connection->select(
            "CommunicationMessages",
            $select,
            "WHERE (AccFrom = $From AND AccTo = $To) OR (AccTo = $From AND AccFrom = $To) ORDER BY tbl.ID",
            $join
        );
    }

}

?>