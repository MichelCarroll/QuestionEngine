<?php

namespace Controller;

abstract class AbstractController 
{
    abstract public function execute();
    
    public function getParameter($name, $required = true) {
        
        $var = null;
        
        if($this->isPost() && isset($_POST[$name])) {
            $var = $_POST[$name];
        }
        else if (isset($_GET[$name])){
            $var = $_GET[$name];
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
