<?php

Class C_myaccount {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngHome;
        global $lng;
        global $Urls;


        $this->_controller = ucwords(__CLASS__);
        $this->_model = new DbHome();
        $this->_view = new View(strtolower($this->_controller));

        $this->_view->set("URL_Login", XX . $lng . XX . $Urls['ProfileLogin']['url']);
        $this->_view->set("URL_Addproperty", XX . $lng . XX . $Urls['Addproperty']['url']);
        $this->_view->set("URL_Registration",  XX . $lng . XX . $Urls['ProfileReg']['url']);

        foreach($LngHome as $key => $val) {
            $this->_view->set($key, $LngHome[$key]);
        }

        $this->_view->output();

    }
    
}

?>