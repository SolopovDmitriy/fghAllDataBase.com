<?php


namespace MyApp;


abstract  class MethodExecuter
{
    abstract function index();
    public function call($method_name) {
        if(method_exists($this, $method_name)){
            $this->$method_name();
        } else {
            throw new \Exception('Method '.$method_name."() - not exists");
        }
    }
}