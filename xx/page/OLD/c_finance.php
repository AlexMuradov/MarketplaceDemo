<?php

Class c_finance {
    
    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $lng;
        global $http_request;
        global $LngMerged;
        global $LngEventTypes;
        global $LngFooter;

        $this->_controller = strtolower(__CLASS__);
        $this->_modelCabinet = new DbCabinet();
        $this->_view = new View($this->_controller);

        $this->_view->Protected();

        $ProgramLocalVars = array(
            "FinanceReport" => $this->_modelCabinet->getFinancialReport($_SESSION['UID']),
            "EventTypes" => $LngEventTypes
        );

        foreach($LngFooter as $key => $val) {
            $this->_view->set($key, $LngFooter[$key]);
        }

        $LngMerged = array_merge(
            $LngFooter
        );

        $this->_view->CreateLocalVars("LngMerged", $ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);
        $this->_view->output();

    }
}

?>