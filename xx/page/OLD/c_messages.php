<?php

Class C_messages {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngHome;
        global $LngMessages;
        global $LngMerged;
        global $http_request;
        global $lng;
        global $Urls;

        $this->_controller = strtolower(__CLASS__);
        $this->_model = new DbProperty();
        $this->_modelCabinet  = new DbCabinet();
        $this->_view = new View($this->_controller);

        $uid = $_SESSION['UID'];

        $this->_view->Protected();

        foreach($LngMessages as $key => $val) {
            $this->_view->set($key, $LngMessages[$key]);
        }

        $LngMerged = array_merge(
            $LngHome
        );
        
        $ProgramLocalVars = array(
            "MessageList" => $this->_modelCabinet->ListMessages($uid),
            "UID" => $uid
        );

        $this->_view->CreateLocalVars("LngMerged",$ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);

        $this->_view->output();

    }
    
}

?>