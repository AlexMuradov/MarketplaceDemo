<?php

Namespace Xx\Page;
Use System as System;

Class Fileupload {
    
    function __construct() {
        global $urlvars;
        extract($urlvars);
        global $lng;
        global $http_request;
        global $connection;
        global $userID;
        
        $t = $http_request->webvar("type","get");
        $d = $http_request->webvar("del","get");
        $m = $http_request->webvar("makemain","get");
        $o = $http_request->webvar("listfiles","get");
        $l = $http_request->webvar("listing","get");
        $uid = $userID;


        //require_once(HOME . XX . "system" . XX . "gdimagestyle.php");
        $gd = new System\gdImagestyle();

        if($o) { 
            if(!isset($l) || !isset($uid)) {
                exit();
            }
            $data = array(
                "ID",
                "Filename",
                "Type"
            );
            $filter = "WHERE Active = 1 AND ListingID = $l AND (AccountID = " . $uid . " OR AccountID = 4)";
            print json_encode( $connection->select("AccountImages", $data, $filter) );
            exit();
        }

        if (!empty($_FILES)) {
            if($_FILES['file']['type'] != "image/jpeg") {
                exit();
            } else {

                if($t == 1) {
                    $uploadFolder = "listings";
                    $filename = $l . "_" . sha1(time()) . ".jpg";
                } else {
                    header("Location: /");
                }
        
                $Folder = HOME . XX . "static" . XX . "uploads" . XX . $uploadFolder . XX;

                $tempFile = $_FILES['file']['tmp_name'];
                $targetFile =  $Folder . $filename;
                move_uploaded_file(
                    $tempFile,
                    $targetFile
                );
                
                $mainExists = $connection->exists("AccountImages","WHERE ListingID=$l AND Type=1 AND Active = 1");
                if($mainExists) {
                    $mainType = 0;
                } else {
                    $mainType = 1;
                }

                $data = array(
                    "ListingID" => $l,
                    "Filename" => $filename,
                    "AccountID" => $uid,
                    "Type" => $mainType
                );

                $resz = $gd->image_resize($targetFile,400,400);
                imagejpeg($resz, $Folder . "thumbs" . XX . $filename);

                $resz_m = $gd->image_resize($targetFile,70,70);
                imagejpeg($resz_m, $Folder . "m_thumbs" . XX . $filename);

                $connection->insert("AccountImages", $data);
            }
        } elseif($d) {

            $data = array(
                "Filename",
                "Type",
                "ListingID"
            );
            $filter = "WHERE AccountID = $uid AND Active = 1 AND ID = " . $d;
            if(!$connection->exists("AccountImages",$filter)) {
                header("Location: /");
                exit();
            }
            $dbfilename = $connection->select("AccountImages", $data, $filter);
            //exit(print_r($dbfilename[0]['Filename']));

            $Folder1 = HOME . XX . "static" . XX . "uploads" . XX . "listings" . XX;
            $Folder2 = HOME . XX . "static" . XX . "uploads" . XX . "listings/thumbs" . XX;
            $Folder3 = HOME . XX . "static" . XX . "uploads" . XX . "listings/m_thumbs" . XX;
            unlink($Folder1 . $dbfilename[0]['Filename']);
            unlink($Folder2 . $dbfilename[0]['Filename']);
            unlink($Folder3 . $dbfilename[0]['Filename']);

            $data = array(
                "Active" => 0
            );
            $connection->update("AccountImages", $data, "WHERE (AccountID = $uid OR AccountID = 4) AND ID = " . $d);

            if($dbfilename[0]['Type']) {
                $data = array("ID");
                $filter = "WHERE Active = 1 AND ListingID = " . $dbfilename[0]['ListingID'];

                if($connection->exists("AccountImages",$filter)) {
                    $newMain = $connection->select("AccountImages", $data, $filter . " ORDER BY ID LIMIT 1");
                    $data = array(
                        "Type" => 1
                    );
                    $connection->update("AccountImages", $data, "WHERE ID = " . $newMain[0]['ID']);
                }
                
            }

        } elseif($m) {
            $data = array(
                "ListingID"
            );
            $filter = "WHERE (AccountID = $uid OR AccountID=4) AND ID = " . $m;
            $dbfilename = $connection->select("AccountImages", $data, $filter);

            $filter1 = "WHERE (AccountID = $uid OR AccountID=4) AND Active = 1 AND ID = " . $m;

            $filter2 = "WHERE (AccountID = $uid OR AccountID=4) AND Active = 1 AND ListingID = " . $dbfilename[0]['ListingID'];

            $connection->update("AccountImages", array("Type" => 0), $filter2);
            $connection->update("AccountImages", array("Type" => 1), $filter1);
            exit();

        } else {
            header("Location: /");
        }

    }

}

?>