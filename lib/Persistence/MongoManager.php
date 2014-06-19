<?php

namespace Persistence;

use Mandango\Cache\ArrayCache;
use Mandango\Connection;
use Mandango\Mandango;
use Model\Mapping\MetadataFactory;
use Configs;

/**
 * Handles initiating Mandango
 *
 * @author mcarroll
 */
class MongoManager 
{
    const CONNECTION_NAME = 'questions';
    
    /**
     * @var Mandango 
     */
    private static $instance = null;
    
    public static function getInstance() {
        if(is_null(self::$instance)) 
        {
            self::$instance = new Mandango(
                new MetadataFactory(), 
                new ArrayCache()
            );
            self::$instance->setConnection(self::CONNECTION_NAME, new Connection(
                Configs::get('connection_string', 'mandango'), 
                Configs::get('database', 'mandango')
            ));
            self::$instance->setDefaultConnectionName(self::CONNECTION_NAME);
        }
        return self::$instance;
    }
}