<?php

namespace App\Core;
use App\Core\Classes\Errors;

class ControllerLoader
{
    private $url;
    private $controller;
    private $action;
    private $namespace = 'App\\Controllers\\';

    function __construct()
    {
        if(!empty($_GET)){
            $this->url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));;
        }

        if(isset($this->url[0])){
            $this->controller = $this->namespace . $this->url[0] .'Controller';
        } else {
            $this->url[0] = 'main';
            $this->controller = $this->namespace . 'MainController';
        }

        if(isset($this->url[1])){
            $this->action = $this->url[1];
        } else {
            $this->action = 'index';
        }
        $this->createController();
    }

    function createController(){
        if(class_exists($this->controller)){
            $parent = class_parents($this->controller);
            if(in_array($this->namespace . 'Controller', $parent)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->url, $this->action);
                } else {
                    Errors::error('404');
                    //throw new \Exception('Action ' . $this->action . ' not found!');
                }
            } else {
                Errors::error('404');
                //throw new \Exception('Controller not found!');
            }
        } else {
            Errors::error('404');
            //throw new \Exception('Controller ' . $this->controller . ' not found!');
        }
    }
}