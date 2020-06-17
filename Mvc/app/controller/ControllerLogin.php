<?php

namespace app\Controller;

use App\Model\ClassLogin;
use Src\Classes\ClassRender;

class ControllerLogin extends ClassLogin{

    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parseUrl())==1){
            $render = new ClassRender();
            $render->setTitle("Login");
            $render->setDescription("Faça seu login");
            $render->setKeywords("login, login website, are restrita");
            $render->setDir("login");
            $render->renderLayout();
        }
        
    }

    public function validarLogin()
    {
        $result = $this->validarUsuario($_POST['user'], $_POST['pass']);

        if($result){
            echo "Login efetuado";
        }else{
            echo "Login incorreto";
        }
    }
}