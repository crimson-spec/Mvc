<?php

namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes{

    use TraitUrlParser;

    private $rota;
    private $url;
    private $index;

    #Método de retorno da rota
    public function getRota()
    {
        $this->url = $this->parseUrl();
        $this->index = $this->url[0];

        $this->rota = [
            '' => 'ControllerHome',
            'home' => 'ControllerHome',
            'sitemap' => 'ControllerSitemap',
            'contato' => 'ControllerContato',
            'login' => 'ControllerLogin',
            'cadastro' => 'ControllerCadastro'
        ];


        if(array_key_exists($this->index, $this->rota)){
            if(file_exists(DIRREQ."app/controller/{$this->rota[$this->index]}.php")){
                return $this->rota[$this->index];
            }else{
                return "ControllerHome";
            }
        }else{
            return "Controller404";
        }
    }
}