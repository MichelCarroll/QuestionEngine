<?php

namespace Persistence;

/**
 * Description of RepositoryFetcher
 *
 * @author mcarroll
 */
class RepositoryFetcher 
{
    /**
     * @param string $modelName
     * @return \Mandango\Repository
     * @throws RepositoryNotFoundException
     */
    public static function get($modelName) {
        
        $className = '\\Model\\'.$modelName.'Repository';
        if(!class_exists($className)) 
        {
            throw new RepositoryNotFoundException();
        }
        
        $mandango = MongoManager::getInstance();
        return new $className($mandango);
    }
    
}
