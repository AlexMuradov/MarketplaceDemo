## Installation

To install infrastructure place go to the [installation guide](https://github.com/alik116/TerraformDocker_Marketplace)


## Examples

Please note that this MVC does use dynamic routing so it is not neccessary to specify specific routes. To understand more about routing please [see source code of routing file.](https://github.com/alik116/MarketplaceDemo/blob/master/system/request.php)

* Model

```php
Namespace Xx\Model\Misc;

Class Autocomplete {

    Public Function City($Data, $Limit) {
        global $connection;
        return $connection->select(
            "SettingLocalization", 
            ["ID", "LocID", "City"], 
            "WHERE City LIKE '$Data%' LIMIT $Limit"
        );

    }

    Public Function GetCity($Id) {
        global $connection;
        return $connection->select(
            "SettingLocalization", 
            ["City"], 
            "WHERE ID = '$Id'"
        );
    }
}
```

* Controller

```php
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

        // Setting up a view
        $this->_view = new System\View('home');

        // Front-end variables collection
        $ProgramLocalVars = array(
            "Lng" => $lng,
            "Vars" => $Language->Import(["LngHome", "LngFooter"]),
            "LngCity" => $Language->Import("LngCity"),
            "LngHomepageHeader" => $Language->Import("LngHomepageHeader"),
            "userID" => $userID,
            "CurrencyList" => $Language->Import("LngCurrency"),
            "userNotifications" => 1
        );

        // Creating front end variables
        $this->_view->CreateLocalVars($ProgramLocalVars);
        // Creating JS (e.g. home_ru.js)
        $this->_view->CreateLocalScript('home');

        $Titles = $Language->Import("LngTitles");
        $this->_view->set("title", $Titles['home']);

        // Buffer output
        $this->_view->output();

    }

}
```
* Views

Views are located under /views/ folder and have and using simple custom templating [engine](https://github.com/alik116/MarketplaceDemo/blob/master/system/view.php) similar to moustahe.js Html files are rendered and every back-end variable can be accessed, looped, and cached via double brackets:

```html
<span>
   My user id is: <span>{{userID}}</span>
</span>
```


## Contributing
* Alex Muradov (MVC)
* Fatalizade Farid (JS and Controllers)
* Elvin Gasanov (Front-End)

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)