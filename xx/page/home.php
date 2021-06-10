<?php

Namespace Xx\Page;
Use System as System;
Use Localization as Localization;

Class Home {
    
    public function __construct() {
        global $urlvars;
        extract($urlvars);
        global $http_request;
        global $Language;
        global $userID;
        global $lng;
        global $connection;
        global $_Controller;

        // Определение имени контроллера и вызов Вью класса
        $this->_view = new System\View('home');

        // Сбор переменных для фронта
        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome", "LngFooter"]),
            "LngCity" => $Language->Import("LngCity"),
            "LngHomepageHeader" => $Language->Import("LngHomepageHeader"),
            "userID" => $userID,
            "CurrencyList" => $Language->Import("LngCurrency"),
            "userNotifications" => 1
        );

        // Cоздание переменных на фронте
        $this->_view->CreateLocalVars($ProgramLocalVars);
        // Создание JS скрипта (e.g. home_ru.js)
        $this->_view->CreateLocalScript('home');

        $Titles = $Language->Import("LngTitles");
        $this->_view->set("title", $Titles['home']);

        // Выходная точка буферизации
        $this->_view->output();

    }

}

?>