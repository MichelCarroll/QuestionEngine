<?php

/**
 * Singleton that manages the application configuration
 */
class Configs {
    
    public static $data;
    
    /**
     * @param array $data
     */
    public static function set(array $data) {
        self::$data = $data;
    }
    
    /**
     * @param string $key
     * @param string $namespace
     * @return mixed
     */
    public static function get($key, $namespace = 'default') {
        if(isset($key, self::$data[$namespace])) {
            return self::$data[$namespace][$key];
        }
    }
}
