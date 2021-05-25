<?php
 
Class Init {

    protected $homeclass;

    public function __construct() {
        global $lng;
        global $_maintanance;
        global $_maintananceServer;

        spl_autoload_register(function ($class) {
            
            $class = str_replace('\\','/',$class);

            if(file_exists(HOME . XX . strtolower($class) . '.php')) {
                
                require_once HOME . XX . strtolower($class) . '.php';
                
            }

    });

    }

}

?>