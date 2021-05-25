<?php

Class C_reviews {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngHome;
        global $LngReviews;
        global $LngMerged;
        global $http_request;
        global $lng;
        global $Urls;

        $this->_controller = strtolower(__CLASS__);
        $this->_model = new DbProperty();
        $this->_modelCabinet  = new DbCabinet();
        $this->_view = new View($this->_controller);

        $this->_view->Protected();

        $propertyId = $http_request->webvar("id", "get");

        if(!$propertyId) {
            header("Location: /");
        }

        foreach($LngReviews as $key => $val) {
            $this->_view->set($key, $LngReviews[$key]);
        }

        $LngMerged = array_merge(
            $LngHome
        );

        $ProgramLocalVars = array(
            "PropertyDescription" => $this->_model->GetListingInfo(
                "WHERE ID = $propertyId", 
                "PropertyListings", 
                array("Description")),
            "testo" => 1
        );

        if($http_request->webvar("doReview", "post")) {
            $this->_modelCabinet->doReview(
                $propertyId,
                $http_request->webvar("cleanness", "post"),
                $http_request->webvar("location", "post"),
                $http_request->webvar("price", "post"),
                $http_request->webvar("communication", "post"),
                $http_request->webvar("liked", "post"),
                $http_request->webvar("notliked", "post")
            );

            header("Location: /$lng/c_reviewsuccess");
        }
        
        $this->_view->CreateLocalVars("LngMerged",$ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);

        $this->_view->output();

    }
    
}

?>