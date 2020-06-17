<?php

namespace App\Model;

use PDOException;

abstract class ClassConexao{
    public function conectaDB()
    {
        try{
            $connect = new \PDO(
                "mysql:host=".HOST.";dbname=".DBNAME,
                USER,
                PASSWD
            );
            return $connect;
        }catch(PDOException $exception){
            return $exception->getMessage();
        }
    }
}