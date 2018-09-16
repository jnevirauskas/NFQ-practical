<?php

class Loader
{
    private $url;
    private $controller;
    private $action;
    private $namespace = 'App\\Controllers\\';

    function __construct($url)
    {
        if(!empty($_GET)){
            $this->url = $_GET;
        }

        if(isset($this->url['controller'])){
            $this->controller = $this->namespace . $this->url['controller'] .'Controller';
        } else {
            $this->controller = $this->namespace . 'MainController';
        }

        if(isset($this->url['action'])){
            $this->action = $this->url['action'];
        } else {
            $this->action = 'index';
        }
    }

    function createController(){
        if(class_exists($this->controller)){
            $parent = class_parents($this->controller);
            if(in_array($this->namespace . 'Controller', $parent)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->url, $this->action);
                } else {
                    throw new \Exception('Action ' . $this->action . ' not found!');
                }
            } else {
                throw new \Exception('Controller not found!');
            }
        } else {
            throw new \Exception('Controller ' . $this->controller . ' not found!');
        }
    }
}