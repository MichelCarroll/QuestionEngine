<?php

namespace Controller;


/**
 * Description of FrontController
 *
 * @author mcarroll
 */
class FrontController 
{
    public static $routes = array();
    
    public static function setRoutes(array $routes) 
    {
        self::$routes = $routes;
    }
    
    public static function dispatch($uri) 
    {
        if(!isset(self::$routes[$uri])) {
            throw new \Exception('Route not found');
        }
        
        $routeClass = self::$routes[$uri];
        $action = new $routeClass();
        $action->execute();
    }
    
}
