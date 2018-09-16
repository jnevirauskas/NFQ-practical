<?php

namespace App\Core;
use App\Core\Classes\Errors;

class ControllerLoader
{
    private $url;
    private $controller;
    private $method;
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
            $this->method = $this->url[1];
        } else {
            $this->method = 'index';
        }
        $this->createController();
    }

    function createController(){
        if(class_exists($this->controller)){
            $parent = class_parents($this->controller);
            if(in_array($this->namespace . 'Controller', $parent)){
                if(method_exists($this->controller, $this->method)){
                    return new $this->controller($this->url, $this->method);
                } else {
                    Errors::error('404');
                }
            } else {
                Errors::error('404');
            }
        } else {
            Errors::error('404');
        }
    }
}