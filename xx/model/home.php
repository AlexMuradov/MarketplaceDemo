<?php

Namespace Xx\Model;

Class Home { 

    protected $model;
    protected $result;
    public function __construct() {

        global $test;

    }

    public function ListingDetails($id) {
        global $object;
        global $mysqli;

        $object = $mysqli->query("Select ID, DatePublished From PropertyListings ");
        $result = $object->fetch_all(MYSQLI_ASSOC);
        $object->close();
        return $result;
    }

    public function varbuf() {
        global $json_vars;
        global $result;
        $vars = json_decode(file_get_contents($this->_modelcachefile));

        $i = 0;
        foreach ($result[3] as $value) {
            $this->_vars[$vars[$i]] = $value;
            $i++;
        }

    }

}

?>