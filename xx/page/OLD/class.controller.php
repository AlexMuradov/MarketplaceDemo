<?php

class Controller

{
protected $_model;
protected $_controller;
protected $_action;
protected $_view;
protected $_modelBaseName;

public function __construct($model, $action)
{
exit("class controller discontinued");
    $this->_controller = ucwords(__CLASS__);
$this->_action = $action;
$this->_modelBaseName = $model;

$this->_view = new View(HOME . XX . 'views' . XX . strtolower($this->_modelBaseName) . '.' . $action . '.xxx');
}

protected function _setModel($modelName)
{
$modelName .= 'Model';
$this->_model = new $modelName();
}

protected function _setView($viewName)
{
$this->_view = new View(HOME . XX . 'views' . XX . strtolower($this->_modelBaseName) . XX . $viewName . '.xxx');
}
}

?>