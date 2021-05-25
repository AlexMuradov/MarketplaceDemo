<?php

Class Auth {

    protected $_model;
    protected $_controller;
    protected $_view;
    protected $_InputLogin;
    protected $_InputPasswd;

    public function __construct() {
        global $urlvars;
        global $homepage;
        global $login123;

        $this->_controller = ucwords(__CLASS__);
        $this->_model = new DbAuth(strtolower($this->_controller));
        $this->_view = new View(strtolower($this->_controller));
        
        if($this->_view->webvar("Makelogin","post")) {
            if($this->_model->login(
                $this->_view->webvar("Login","post"), 
                $this->_view->webvar("Password","post")
            )) {
                $login123 = 322333333;
            } else {
                $login123 = 322333333;
            }
        }
    }
}

?>