<?php

require('bootstrap.php');

use Mandango\Mondator\Mondator;
use Mandango\Extension\Core;

$classes = array(
    'Model\Question' => array(
        'fields' => array(
            'name'   => 'string',
            'title' => 'string',
            'type'   => 'string'
        ),
        'referencesOne' => array(
            'survey' => array('class' => 'Model\Survey'),
        ),
    ),
    'Model\Survey' => array(
        'fields' => array(
            'name'   => 'string'
        ),
    ),
);


$mondator = new Mondator();
$mondator->setConfigClasses($classes);
$mondator->setExtensions(array(
    new Core(array(
        'metadata_factory_class'  => 'Model\Mapping\MetadataFactory',
        'metadata_factory_output' => __DIR__.'/lib/Model/Mapping',
        'default_output'          => __DIR__.'/lib/Model',
    )),
));

// process
$mondator->process();
