<?php

namespace Persistence;

use Mandango\Cache\FilesystemCache;
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
    private static $instance = null;
    
    public static function getInstance() {
        if(is_null(self::$instance)) 
        {
            self::$instance = new Mandango(
                new MetadataFactory(), 
                new FilesystemCache(
                    ROOT_DIR.'/'.Configs::get('cache_dir', 'mandango')
                )
            );
            self::$instance->setConnection('default', new Connection(
                Configs::get('connection_string', 'mandango'), 
                Configs::get('database', 'mandango')
            ));
        }
        return self::$instance;
    }
}