<?php

namespace App\Controllers;
use App\Core\Classes\Errors;

abstract class Controller
{
    protected $url;
    protected $action;

    function __construct($url, $action)
    {
        $this->url = $url;
        $this->action = $action;
        $this->executeAction();
    }

    function executeAction()
    {
        if(!empty($this->action)){
            return $this->{$this->action}();
        }
    }

    public function view($view, $data = [])
    {
        $view_file = dirname(__DIR__) . DIRECTORY_SEPARATOR. 'Views' . DIRECTORY_SEPARATOR . $view . '.php';
        if( file_exists($view_file) ){
            require_once ($view_file);
        } else {
            Errors::error(404);
            //throw new \Exception('View not found!');
        }
    }

}