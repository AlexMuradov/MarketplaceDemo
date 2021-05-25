<?php

Class Listingterms {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $lng;
        global $http_request;
        global $LngHome;
        global $LngMerged;
        
        $this->_controller = strtolower(__CLASS__);
        $this->_modelProperty = new DbProperty();
        $this->_view = new View($this->_controller);

        // Add {{}} variables
        foreach($LngHome as $key => $val) {
            $this->_view->set($key, $LngHome[$key]);
        }

    
        // Массивные переменные писать сюда
        $ProgramLocalVars = array(
        );

        // Где нужно выводить по одному писать сюда
        $LngMerged = array_merge(
            $LngHome
        );

        $this->_view->CreateLocalVars("LngMerged",$ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);
        $this->_view->output();
    }
}
?>