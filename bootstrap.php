<?php

require('vendor/autoload.php');

define('ROOT_DIR', __DIR__);

spl_autoload_register(function ($class) {
    include 'lib/' . str_replace('\\', '/', $class) . '.php';
});

Configs::set(Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/config/app.yml')));
//$repo = \Persistence\RepositoryFetcher::get('Question');