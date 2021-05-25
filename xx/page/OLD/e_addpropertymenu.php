<?php

Class E_addpropertymenu {

    protected $asset;
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $_vars = array();
    protected $_modelBaseName;
    
    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngAddProperty;
        global $lng;
        global $Urls;

        $this->_controller = ucwords(__CLASS__);
        $this->_model = new DbHome();
        $this->_view = new View(strtolower($this->_controller));

        foreach($LngAddProperty as $key => $val) {
            $this->_view->set($key, $LngAddProperty[$key]);
        }

        $this->_view->output("DEV");

    }

}

?>