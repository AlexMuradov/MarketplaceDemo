<?php

Namespace Xx\Page\Cabinet;
Use System as System;
Use Localization as Localization;
Use Xx\Model\Communication as Models;
Use Xx\Model\Misc as ModelsMisc;

Class Message {

    public function __construct() {
        global $_Controller;
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_model = new Models\Message();
        $this->_view = new System\View($_Controller);
        $this->_view->Protected();

        $To = $http_request->webvar("To", _POST, "int", "Send", 1, 999999);
        $Message = $http_request->webvar("Message", _POST, "string", "Send");
        $http_request->api(
            "Send",
            "Xx\Model\Communication\Message",
            [$userID, $To, $Message],
            FALSE,
            _POST
        );

        $From = $http_request->webvar("From", _GET, "int", "Read", 1, 999999);
        $Read = $http_request->api(
            "Read",
            "Xx\Model\Communication\Message",
            [$From, $userID]
        );

        if(isset($_FILES['file'])) $file = $_FILES; else $file = FALSE;
        $To = $http_request->webvar("To", _POST, "int", "mAttach", 1, 999999);
        print $http_request->api(
            "mAttach",
            "Xx\Model\Communication\Message",
            [
                $file, 
                sha1(time()) . ".jpg", 
                HOME . "/static/uploads/media/",
                "image/jpeg",
                $userID,
                $To,
                $file['file']['name']
            ],
            FALSE,
            _POST
        );

        $ProgramLocalVars = array(
            "lng" => $lng,
            "Inbox" => $this->_model->Inbox($userID),
            "Read" => $Read,
            "From" => $From
        );

        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();

    }

}

?>