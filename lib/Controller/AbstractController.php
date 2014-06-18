<?php

namespace Controller;

abstract class AbstractController 
{
    abstract public function execute();
    
    public function getParameter($name, $required = true) {
        if($this->isPost()) {
            $var = filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        else {
            $var = filter_input(INPUT_GET, $name, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        if($required && (is_null($var) || empty($var))) {
            throw new \InvalidArgumentException('Missing the parameter '.$name);
        }
        
        return $var;
    }
    
    public function isPost() {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }
    
    public function isGet() {
        return ($_SERVER['REQUEST_METHOD'] === 'GET');
    }
}
