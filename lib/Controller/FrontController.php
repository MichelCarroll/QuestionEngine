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
            http_response_code(404);
            exit;
        }
        
        $routeClass = self::$routes[$uri];
        $action = new $routeClass();
        
        header('Content-Type: application/json');
        
        try {
            $returnValues = $action->execute();
        } catch (\Exception $ex) {
            http_response_code(500);
            echo json_encode(array('error' => $ex->getMessage()));
            exit;
        }
        
        echo json_encode($returnValues);
    }
}
