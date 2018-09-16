<?php

namespace App\Core\Config;

class Config
{
    public static function get($path = null)
    {
        if($path)
        {
            $config = $GLOBALS['config'];
            $paths = explode('/', $path);

            foreach($paths as $bit){
                if(isset($config[$bit]))
                {
                    $config = $config[$bit];
                }
            }

            return $config;

        } else
        {
            return new \Exception('Configuration path not set');
        }
    }
}

$GLOBALS['config'] = array(
    //database
    'mysql' => array(
        'host' => 'localhost',
        'database' => 'nfq',
        'username' => 'root',
        'password' => 'root',
    )
);