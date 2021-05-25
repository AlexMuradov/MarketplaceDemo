<?php

Namespace Xx\Page\Auth;
Use System as System;
Use Xx\Model as Models;
Use Localization as Localization;

Class Signout {

    protected $_controller;
    protected $_view;

    public function __construct() {
        global $_Controller;
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $Language;
        global $userID;
        global $lng;
        global $connection;
        global $mailer;
        global $_Result;
        global $errors;

        $this->_modelAuth = new Models\Auth\Auth();

        // $PostRedirect = $http_request->webvar("redirect", _POST, "string");
        // if ($PostRedirect) $_SESSION['redirect'] = $PostRedirect;
        $this->_modelAuth->Logout();

        if(isset($_SESSION['redirect'])) {
            $redirect = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
            header("Location: $redirect");
        } else {
            header("Location: /");
        }

    }

}

?>