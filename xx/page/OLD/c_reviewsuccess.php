<?php

Class C_reviewsuccess {

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
        global $LngReviews;
        global $lng;
        global $Urls;

        $this->_controller = strtolower(__CLASS__);
        $this->_model = new DbHome();
        $this->_view = new View($this->_controller);

        foreach($LngReviews as $key => $val) {
            $this->_view->set($key, $LngReviews[$key]);
        }

        $this->_view->output("DEV");

    }

}

?>