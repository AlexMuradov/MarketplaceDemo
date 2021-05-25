<?php

Class E_cabinetmenu {

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
        global $LngHome;
        global $lng;
        global $Urls;

        $this->_controller = ucwords(__CLASS__);
        $this->_model = new DbHome();
        $this->_view = new View(strtolower($this->_controller));

        foreach($LngHome as $key => $val) {
            $this->_view->set($key, $LngHome[$key]);
        }

        $this->_view->output("DEV");

    }

}

?>