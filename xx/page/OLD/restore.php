<?php

Class Restore {


    protected $_view;
    protected $_vars = array();

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngRegistration;
        global $lng;

        $this->_controller = ucwords(__CLASS__);
        $this->_modelVerify = new DbVerify();
        $this->_view = new View(strtolower($this->_controller));

        if($this->_view->webvar("Makeregistration","post")) {

        }

        $this->_view->output();

    }

}

?>