<?php

Class C_bookingrequests {
    //blah blah
    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $lng;
        global $http_request;
        global $LngMerged;
        global $LngFooter;

        $this->_controller = strtolower(__CLASS__);
        $this->_modelCabinet = new DbCabinet();
        $this->_view = new View($this->_controller);

        $this->_view->Protected();

        $AccountID = $_SESSION['UID'];

        $doConfirm = $http_request->webvar("doConfirm", "get", "int", false, 0, 1);
        
        if ($doConfirm) {
            $id = $http_request->webvar("ID", "get", "int", true);

            $doGetStatus = $this->_modelCabinet->getBookingRequestStatus($id, $AccountID);
            if ($doGetStatus[0]["Status"] == "") {
                $this->_modelCabinet->confirmBookingRequest($id, $AccountID);
            }
            else print "status is already set";
        }

        $doCancel = $http_request->webvar("doCancel", "get", "int", false, 0, 1);
        if ($doCancel) {
            $id = $http_request->webvar("ID", "get", "int", true);

            $doGetStatus = $this->_modelCabinet->getBookingRequestStatus($id, $AccountID);
            if ($doGetStatus[0]["Status"] == "") {
                $this->_modelCabinet->cancelBookingRequest($id, $AccountID);
            }
            else print "status is already set";
        }

        $ProgramLocalVars = array(
            "BookingRequests" => $this->_modelCabinet->getBookingRequests($AccountID)
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