<?php

require('bootstrap.php');

use Mandango\Mondator\Mondator;
use Mandango\Extension\Core;


$mondator = new Mondator();

$mondator->setConfigClasses(array(
    'Model\Question' => array(
        'fields' => array(
            'name'   => 'string',
            'string' => 'string',
        ),
    ),
));

$mondator->setExtensions(array(
    new Core(array(
        'metadata_factory_class'  => 'Model\Mapping\MetadataFactory',
        'metadata_factory_output' => __DIR__.'/lib/Model/Mapping',
        'default_output'          => __DIR__.'/lib/Model',
    )),
));

// process
$mondator->process();
