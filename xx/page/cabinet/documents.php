<?php

Namespace Xx\Page\Cabinet;

Use System as System;
Use Xx\Model\Account as Models;
Use Localization as Localization;
Use Xx\Model\Account as Account;

Class Documents {

    public function __construct() {
        global $_Controller;
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $lng;
        global $Language;
        global $userID;

        $this->_model = new Models\Documents();
        $this->_view = new System\View($_Controller);
        $this->_view->Protected();

        if(isset($_FILES['api__AddFront'])) { 
            $fileFront = $_FILES['api__AddFront']; 
            $_POST['api__AddFront'] = TRUE;
        } else { 
            $fileFront = FALSE;
            $_POST['api__AddFront'] = FALSE;
        }

        if(isset($_FILES['api__AddBack'])) { 
            $fileBack = $_FILES['api__AddBack']; 
            $_POST['api__AddBack'] = TRUE;
        } else { 
            $fileBack = FALSE;
            $_POST['api__AddBack'] = FALSE;
        }

        $IDType = $http_request->webvar("IDType", _POST, "int", "AddBack", 0, 2);
       
        $http_request->api(
            "AddFront",
            "Xx\Model\Account\Documents",
            [
                $fileFront,
                sha1(time()) . "_front.jpg", 
                HOME . "/static/uploads/IDDocuments/",
                "image/jpeg",
                $userID,
                $IDType
            ],
            FALSE,
            _POST
        );

        $http_request->api(
            "AddBack",
            "Xx\Model\Account\Documents",
            [
                $fileBack,
                sha1(time()) . "_back.jpg", 
                HOME . "/static/uploads/IDDocuments/",
                "image/jpeg",
                $userID,
                $IDType
            ],
            FALSE,
            _POST
        );

        $http_request->api(
            "DeleteAll",
            "Xx\Model\Account\Documents",
            [
                $userID
            ],
            FALSE,
            _POST
        );


        $ProgramLocalVars = array(
            "Lng" => $lng,
            "AccountDocuments" => $this->_model->getDocuments($userID),
            "User" => Account\Details::getPersonalInfoCard($userID)
        );
       
        $this->_view->CreateLocalVars($ProgramLocalVars);
        $this->_view->CreateLocalScript($_Controller);
        $this->_view->output();
    }
}


?>