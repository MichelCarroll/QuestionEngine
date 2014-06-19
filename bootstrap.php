<?php

require('vendor/autoload.php');

define('ROOT_DIR', __DIR__);
define('CONFIG_DIR', __DIR__.'/config');

spl_autoload_register(function ($class) {
    $filename = 'lib/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($filename)) {
        include $filename;
    }
});

error_reporting(E_ALL); ini_set('display_errors', 1);

use Controller\FrontController;
use Symfony\Component\Yaml\Yaml;

Configs::set(Yaml::parse(file_get_contents(CONFIG_DIR.'/app.yml')));
FrontController::setRoutes(Yaml::parse(file_get_contents(CONFIG_DIR.'/routing.yml'))['routes']);

if(isset($_SERVER["REQUEST_URI"])) {
    FrontController::dispatch(strtok($_SERVER["REQUEST_URI"],'?'));
}
