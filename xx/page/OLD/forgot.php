<?php

Class Login  {

    protected $asset;
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $_vars = array();
    protected $_modelBaseName;

    public function __construct() {
        #global $urlvars;
        #extract($urlvars); // Enable URL GET Vars
        global $LngHome;

        $this->_controller = ucwords(__CLASS__);
        $this->_modelHome = new DbLogin();
        $this->_view = new View(strtolower($this->_controller));

        $this->_view->set("formresult", "");

        if($this->_view->webvar("Makelogin","post")) {

            $this->_modelAuth = new DbAuth();
            if($this->_modelAuth->login(
                $this->_view->webvar("Login","post"), 
                $this->_view->webvar("Password","post")
            )) {
                $this->_view->set("formresult", $LngHome['LoginSuccess']);
            } else {
                $this->_view->set("formresult", $LngHome['LoginFail']);
            }
        }

        if($this->_view->webvar("Makeregistration","post")) {

            $this->_modelAuth = new DbAuth();
            if($this->_modelAuth->login(
                $this->_view->webvar("Login","post"), 
                $this->_view->webvar("Password","post")
            )) {
                $this->_view->set("formresult", $LngHome['LoginSuccess']);
            } else {
                $this->_view->set("formresult", $LngHome['LoginFail']);
            }
        }

        if($this->_view->webvar("Makepassretrieve","post")) {

            $this->_modelAuth = new DbAuth();
            if($this->_modelAuth->login(
                $this->_view->webvar("Login","post"), 
                $this->_view->webvar("Password","post")
            )) {
                $this->_view->set("formresult", $LngHome['LoginSuccess']);
            } else {
                $this->_view->set("formresult", $LngHome['LoginFail']);
            }
        }

        $this->_view->output();

    }

}

?>