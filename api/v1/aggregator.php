<?php

Namespace API\v1;

Class Aggregator {
    
    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $userID;
        global $lng;
        
        // => Autocomp
        $http_request->api(
            "City",
            "Xx\Model\Misc\Autocomplete",
            [
                $http_request->webvar("Input", _POST, "string", "City"), 
                4 // Number of returned results
            ],
            _JSON,
            _POST
        );

        $http_request->api(
            "GetCity",
            "Xx\Model\Misc\Autocomplete",
            [
                $http_request->webvar("CityId", _GET, "int", "GetCity")
            ],
            _JSON,
            _GET
        );

        $http_request->api(
            "Favorites",
            "Xx\Model\Property\Main",
            [
                $http_request->webvar("id", _GET, "int", "Favorites", 1, 1000000),
                $userID,
                $http_request->webvar("save", _GET, "int", "Favorites", 0, 1)
            ],
            _JSON,
            _GET
        );

        $http_request->api(
            "SendMail",
            "Api\GoogleMail\Gmail",
            [
                $http_request->webvar("vars", _GET, "string", "SendMail"),
                $http_request->webvar("email", _GET, "string", "SendMail"),
                $http_request->webvar("tempType", _GET, "int", "SendMail")
            ],
            _JSON,
            _POST
        );

        $http_request->api(
            "Display",
            "Xx\Model\Property\Main",
            [
                $http_request->webvar("id", _GET, "int", "Display", 1, 1000000)
            ],
            _JSON,
            _GET
        );

        $http_request->api(
            "EditCalendar",
            "Xx\Model\Misc\Calendar",
            [
                $http_request->webvar("listingId", _POST, "int", "EditCalendar", 1, 1000000),
                $http_request->webvar("datesRange", _POST, "date", "EditCalendar")
            ],
            _JSON,
            _POST
        );

        $http_request->api(
            "SetCustomPrice",
            "Xx\Model\Misc\Calendar",
            [
                $http_request->webvar("listingId", _POST, "int", "SetCustomPrice", 1, 1000000),
                $http_request->webvar("dates", _POST, "date", "SetCustomPrice"),
                $http_request->webvar("price", _POST, "decimal", "SetCustomPrice")
            ],
            _JSON,
            _POST
        );


        $http_request->api(
            "DeleteCustomPrice",
            "Xx\Model\Misc\Calendar",
            [
                $http_request->webvar("listingId", _POST, "int", "DeleteCustomPrice", 1, 1000000),
                $http_request->webvar("dates", _POST, "date", "DeleteCustomPrice")
            ],
            _JSON,
            _POST
        );

        
        $http_request->api(
            "CreateTempPhone",
            "Xx\Model\Account\Details",
            [
                $http_request->webvar("phoneCode", _POST, "string", "CreateTempPhone"),
                $http_request->webvar("phone", _POST, "string", "CreateTempPhone"),
                $http_request->webvar("messCode", _POST, "int", "CreateTempPhone"),
                $userID
            ],
            _JSON,
            _POST
        );

        
        $http_request->api(
            "createPhoneVerify",
            "Xx\Model\Auth\Verify",
            [
                $http_request->webvar("phoneCode", _POST, "string", "createPhoneVerify"),
                $http_request->webvar("phone", _POST, "string", "createPhoneVerify"),
                $userID
            ],
            _JSON,
            _POST
        );
        
        
        $http_request->api(
            "VerifyPassword",
            "Xx\Model\Auth\Verify",
            [
                $http_request->webvar("pass", _POST, "string", "VerifyPassword"),
                $userID
            ],
            _JSON,
            _POST
        );
        
        $http_request->api(
            "UpdatePassword",
            "Xx\Model\Account\Details",
            [
                $http_request->webvar("newPass", _POST, "string", "UpdatePassword"),
                $userID
            ],
            _JSON,
            _POST
        );
        
        $http_request->api(
            "DeleteListing",
            "Xx\Model\Property\Main",
            [
                $http_request->webvar("deleteID", _POST, "int", "DeleteListing"),
                $userID
            ],
            _JSON,
            _POST
        );
        
        $http_request->api(
            "ChangeListingStatus",
            "Xx\Model\Property\Main",
            [
                $http_request->webvar("lid", _POST, "int", "ChangeListingStatus"),
                $http_request->webvar("status", _POST, "int", "ChangeListingStatus"),
                $userID
            ],
            _JSON,
            _POST
        );
        
        $http_request->api(
            "CreateFiatAccount",
            "Xx\Model\Finance\Finance",
            [
                $userID,
                $http_request->webvar("AccNumber", _POST, "bigint", "CreateFiatAccount"),
                $http_request->webvar("CCY", _POST, "int", "CreateFiatAccount"),
                $http_request->webvar("HolderName", _POST, "string", "CreateFiatAccount"),
                $http_request->webvar("HolderAddress", _POST, "string", "CreateFiatAccount"),
            ],
            _JSON,
            _POST
        );

        
        $http_request->api(
            "VerifyWallet",
            "Xx\Model\Auth\Verify",
            [
                $userID,
                $http_request->webvar("vcode", _POST, "int", "VerifyWallet")
            ],
            _JSON,
            _POST
        );

        $http_request->api(
            "DeleteFiatAccount",
            "Xx\Model\Finance\Finance",
            [
                $userID,
                $http_request->webvar("deleteID", _POST, "int", "DeleteFiatAccount")
            ],
            _JSON,
            _POST
        );

        $http_request->api(
            "DefaultFiatAccount",
            "Xx\Model\Finance\Finance",
            [
                $userID,
                $http_request->webvar("accountID", _POST, "int", "DefaultFiatAccount")
            ],
            _JSON,
            _POST
        );
        
        $http_request->api(
            "DeleteAll",
            "Xx\Model\Account\Documents",
            [
                $userID
            ],
            _JSON,
            _POST
        );
        
        $http_request->api(
            "SetPassTempAcc",
            "Xx\Model\Account\Details",
            [
                $http_request->webvar("newPass", _POST, "string", "SetPassTempAcc"),
                $userID
            ],
            _JSON,
            _POST
        );
    }
}

?>