<?php

Class C_bookings {

    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $LngTransactionStatus;
        global $lng;
        global $http_request;
        global $LngHome;
        global $LngMerged;
        global $LngCity;
        global $LngPayment;
        global $LngCurrency;
        global $LngCurrencyXRate;

        $this->_controller = strtolower(__CLASS__);
        $this->_model = new DbHome();
        $this->_modelCabinet = new DbCabinet();
        $this->_modelPayment = new DbPayment();
        $this->_view = new View($this->_controller);
        
        $this->_view->Protected();

        foreach($LngHome as $key => $val) {
            $this->_view->set($key, $LngHome[$key]);
        }

        $ProgramLocalVars = array(
            "CityList" => $LngCity,
            "TransactionStatus" => $LngTransactionStatus,
            "Booking_List" => $this->_modelCabinet->GetBookings($_SESSION['UID']),
            "CurrencyList" => $LngCurrency,
            "CCYXRate" => $LngCurrencyXRate
        );

        // Где нужно выводить по одному писать сюда.
        $LngMerged = array_merge(
            $LngHome,
            $LngPayment
        );

        $this->_view->CreateLocalVars("LngMerged",$ProgramLocalVars);
        $this->_view->CreateLocalScript($this->_controller . "_" . $lng);
        $this->_view->output();

    }
    
}

?>