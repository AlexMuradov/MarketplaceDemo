<?php

Namespace Xx\Model\Account;
Use Xx\Model\Misc as ModelMisc; 

Class Documents Extends ModelMisc\Upload {

    public function getDocuments($AccountID)
    {
        global $connection;

        $table = "AccountDocuments";
        $filter = "WHERE tbl.AccountID =" . $AccountID . " AND STATUS <> 0";
        $data = array(
            "tbl.ID",
            "tbl.Filename",
            "tbl.IDType",
            "tbl.DocumentSide",
            "tbl.Verified"
        );
        return $connection->select($table, $data, $filter);
    }

    public function AddDocument ($file, $name, $folder, $type, $AccountID, $IDType, $Side)
    {
        parent::Attach($file, $name, $folder, $type);
      
        global $connection;

        $data = [
            "Filename" => $name, 
            "IDType" => $IDType,
            "DocumentSide" => $Side,
            "AccountID" => $AccountID,
            "Verified" => 0,
            "Status" => 1
        ];
        $connection->insert("AccountDocuments", $data);

        //$this->DeleteSide($Side, $AccountID);
        //parent::Delete($name, $folder);
    }

    public function DeleteSide($Side, $AccountID)
    {
        // global $connection;
        // $connection->delete("AccountDocuments", "WHERE AccountID = " . $AccountID . " AND DocumentSide =" .$Side);

        global $connection;
        $data = array("Status" => 3);
        $filter = "WHERE (AccountID = " . $AccountID ." AND STATUS <> 0 AND DocumentSide =" . $Side .")";
        $connection->update("AccountDocuments",  $data, $filter);
    }

    public function DeleteAll($AccountID)
    {
        global $connection;
        // echo('test');
        $data = array("Status" => 3);
        $filter = "WHERE (AccountID = " . $AccountID . " AND STATUS <> 0)";
        if($connection->update("AccountDocuments",  $data, $filter)){
            $data = array("VerifiedID" => 0);
            $filter = "WHERE ID = " . $AccountID;
            return $connection->update("AccountSecurity",  $data, $filter);
        }
        else{
            return false;
        }
    }

    public function AddFront($files ,$filename, $folder, $AccountID, $IDType)
    {
        $this->AddDocument($files, $filename, $folder, "image/jpeg", $AccountID, $IDType, 1);
    }
    public function AddBack($files ,$filename, $folder, $AccountID, $IDType)
    {
        $this->AddDocument($files, $filename, $folder, "image/jpeg", $AccountID, $IDType, 2);
    }

}


?>