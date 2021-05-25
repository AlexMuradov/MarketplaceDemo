<?php

Namespace Xx\Page;
Use System as System;

Class Footer {

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
        global $LngFooter;
        global $lng;
        global $Urls;

        $this->_controller = ucwords(__CLASS__);
        $this->_view = new System\View(strtolower($this->_controller));

        foreach($LngFooter as $key => $val) {
            $this->_view->set($key, $LngFooter[$key]);
        }

        $this->_view->output("DEV");

    }

}

?>