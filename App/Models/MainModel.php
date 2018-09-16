<?php

namespace App\Models;


class MainModel extends Model
{
    function getNames(){
        $dbh = $this->db->prepare('SELECT * FROM Orders WHERE 1');
        $dbh->execute();

        if($dbh->rowCount()){
            return $dbh->fetchAll();
        }
    }
}