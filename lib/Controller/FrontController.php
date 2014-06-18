<?php

namespace Controller;

use Configs;

/**
 * Description of FrontController
 *
 * @author mcarroll
 */
class FrontController 
{
    
    public static function dispatch($uri) 
    {
        $route = Configs::get($uri, 'routing');
        if(!$route) {
            throw new \Exception('Route not found');
        }
        
        $action = new $route();
        $action->execute();
    }
    
}
