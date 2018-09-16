<?php

namespace App\Core\Classes;

class Errors
{
    public static function error($view){
        $view_file = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR. 'Views/Errors' . DIRECTORY_SEPARATOR . $view . '.php';
        if( file_exists($view_file) ){
            require_once ($view_file);
        }
    }

}