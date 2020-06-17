<?php

namespace App\Model;

class ClassLogin extends ClassConexao{

    protected function validarUsuario($user, $pass)
    {
        $result = $this->conectaDB()->prepare("SELECT * FROM login WHERE user = :user and pass = :pass");
        $result->bindParam(":user", $user, \PDO::PARAM_STR);
        $result->bindParam(":pass", $pass, \PDO::PARAM_STR);
        $result->execute();

        if($row = $result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}