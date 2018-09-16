<?php

namespace App\Models;

use App\Core\Classes\Database;

abstract class Model
{
    protected $db;

    function __construct()
    {
        $this->db = Database::connect()->database;
    }
}