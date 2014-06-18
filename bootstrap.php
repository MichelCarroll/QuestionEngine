<?php

require('vendor/autoload.php');

define('ROOT_DIR', __DIR__);

spl_autoload_register(function ($class) {
    include 'lib/' . str_replace('\\', '/', $class) . '.php';
});

error_reporting(E_ALL); ini_set('display_errors', 1);


Configs::set(Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/config/app.yml')));
Controller\FrontController::dispatch(strtok($_SERVER["REQUEST_URI"],'?'));