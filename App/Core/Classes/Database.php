<?php

namespace App\Core\Classes;
use App\Core\Config\Config;

class Database
{
    private $db_username = null,
            $db_password = null,
            $db_dsn;

    public $database;

    public $errors;

    private static $dbInstance;

    private function __construct()
    {
        $this->db_username = Config::get('mysql/username');
        $this->db_password = Config::get('mysql/password');
        $this->db_dsn = 'mysql:host=' . Config::get('mysql/host'). ';dbname=' . Config::get('mysql/database');

        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

        try
        {
            $this->database = new \PDO($this->db_dsn, $this->db_username, $this->db_password);
        } catch(\PDOException $ex)
        {
            $this->errors = $ex;
        }
    }

    public static function connect()
    {
        if(!isset(self::$dbInstance)){
            self::$dbInstance = new Database();
        }
        return self::$dbInstance;
    }

    //prevent cloning
    private function __clone(){}

    //prevent unserialization
    private function __wakeup(){}
}