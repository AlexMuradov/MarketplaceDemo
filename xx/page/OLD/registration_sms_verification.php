<?php

Class Registration_Sms_Verification {

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
        $this->_controller = ucwords(__CLASS__);
        $LngVar = "Lng" . $this->_controller;
        global $$LngVar;

        $this->_model= new DbRegistration_Sms_Verification();
        $this->_view = new View(strtolower($this->_controller));

        $this->_view->set("formresult", "");
        $this->_view->set("alertplace", "");

        if($this->_view->webvar("MakeVerification","post")) {

            $_Result = $this->_model->VerifyAccount(
                $this->_view->webvar("VerificationCode","post")
            );
            
            $this->_view->set("formresult", $$LngVar[$_Result]);
            $this->_view->set("alertplace", $this->_view->jalert($$LngVar[$_Result]));

        }

        if($this->_view->webvar("ResendSMS","post")) {

            $_Result = $this->_model->VerifyAccount(
                $this->_view->webvar("VerificationCode","post")
            );
            
            $this->_view->set("formresult", $$LngVar[$_Result]);
            $this->_view->set("alertplace", $this->_view->jalert($$LngVar[$_Result]));

        }

        $this->_view->output();

    }

}

?>