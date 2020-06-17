<?php

namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes{

    private $method;
    private $param = array();
    private $obj;

    public function __construct()
    {
        $this->addController();
    }

    # Método de adição de controller
    private function addController()
    {
        $rotaController = $this->getRota();
        $nameSpace = "App\\Controller\\{$rotaController}";
        $this->obj = new $nameSpace;

        if(isset($this->parseUrl()[1])){
            $this->addMethod();
        }
    }

    # Método de adição de método do controller
    private function addMethod()
    {
        if(method_exists($this->obj, $this->parseUrl()[1])){
            $this->setMethod($this->parseUrl()[1]);
            $this->addParam();
            call_user_func_array([$this->obj, $this->getMethod()], $this->getParam());
        }
    }

    # Método de adição de parâmetro do controller
    private function addParam()
    {
        $countArray = count($this->parseUrl());

        if($countArray > 2){
            foreach($this->parseUrl() as $key => $value){
                if($key > 1){
                    $this->setParam($this->param += array($key => $value));
                }
            }
        }
    }

    /**
     * GETTERS AND SETTERS
     */

    public function setMethod($method)
    {
        $this->method = $method;
    }

    protected function getMethod()
    {
        return $this->method;
    }

    public function setParam($param)
    {
        $this->param = $param;
    }

    protected function getParam()
    {
        return $this->param;
    }
}