<?php

Namespace Xx\ServiceFacades\Cabinet;
Use Xx\Model\Property as Models;

Class BalanceFacade {
    protected $_Transaction;

    public function __construct()
    {
        $this->_Transaction = new \Xx\Model\Transaction;
    }

    public function ConfirmWithdraw($accountID, $amount, $paymethod, $ReceiverID)
    {
        $Type = 3;
        $InitiatorID = 0;
        $PSID = 0;
        $Card = 0;
        $Description = 0;
        $Curr = 1;
        $Status = 1;

        return $this->_Transaction->Create($Status, $PSID, $InitiatorID, $ReceiverID, $amount, $Curr, $Card, $Description, $Type, $paymethod);
    }
}

?>