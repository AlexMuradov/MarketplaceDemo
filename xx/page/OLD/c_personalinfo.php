<?php

Class C_personalinfo {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $LngHome;
        global $lng;
        global $Urls;
        global $LngMerged;
        global $LngPersonalInfo;
        global $LngCountry;
        global $LngCity;

        $this->_controller = strtolower(__CLASS__);
        $this->_model = new DbCabinet();
        $this->_view = new View($this->_controller);

        $this->_view->Protected();
        $ids = $_SESSION['UID'];

        foreach($LngHome as $key => $val) {
            $this->_view->set($key, $LngHome[$key]);
        }

        $doUpdate = $http_request->webvar("doUpdate", "post");
        $listing_id = $http_request->webvar("listing","get");
        if($doUpdate) {
            $this->_model->UpdatePersonalInfo(
                $_POST,
                $_FILES
            );
        }

        $ProgramLocalVars = array(
            "CountryList" => $LngCountry,
            "CityList" => $LngCity,
            "PersonalInfo" => $this->_model->GetPersonalInfo("AccountPersonalInfo", array("*"),"WHERE AccountID = " . $ids),
            "SecurityInfo" => $this->_model->GetPersonalInfo("AccountSecurity", array("Email", "Phone", "Verified"),"WHERE ID = " . $ids)
        );

        $LngMerged = array_merge(
            $LngPersonalInfo
        );

        $this->_view->CreateLocalVars("LngMerged",$ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);
        $this->_view->output();

    }
    
}

?>