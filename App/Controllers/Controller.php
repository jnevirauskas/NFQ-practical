<?php

namespace App\Controllers;
use App\Core\Classes\Errors;

abstract class Controller
{
    protected $url;
    protected $method;

    function __construct($url, $method)
    {
        $this->url = $url;
        $this->method = $method;
        $this->executeMethod();
    }

    function executeMethod()
    {
        if(!empty($this->method)){
            return $this->{$this->method}();
        }
    }

    public function view($view, $data = [])
    {
        $view_file = dirname(__DIR__) . DIRECTORY_SEPARATOR. 'Views' . DIRECTORY_SEPARATOR . $view . '.php';
        if( file_exists($view_file) ){
            require_once ($view_file);
        } else {
            Errors::error(404);
        }
    }

}