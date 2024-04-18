<?php

declare(strict_types=1);

namespace app\guild\router;

class Route
{
    private $_path;
    private $_controller;
    private $_action;
    private $_method;
    private $_param;

    public function __construct($route)
    {
        $this->_path = $route->path;
        $this->_controller = $route->controller;
        $this->_action = $route->action;
        $this->_method = $route->method;
        $this->_param = $route->param;
    }
    public function getPath()
    {
        return $this->_path;
    }
    public function getController()
    {
        return $this->_controller;
    }
    public function getAction()
    {
        return $this->_action;
    }
    public function getMethod()
    {
        return $this->_method;
    }
    public function getParams()
    {
        return $this->_param;
    }
    public function run($httpRequest)
    {
        $controller = null;

        $controllerName = $this->_controller . "Controller";
        if (class_exists($controllerName)) {

            $controller = new $controllerName($httpRequest);
            if (method_exists($controller, $this->_action)) {
                $controller->{$this->_action}(...$httpRequest->getParam());
            } else {
                throw new ActionNotFoundException();
            }
        } else {
            throw new ControllerNotFoundException();
        }

    }
}