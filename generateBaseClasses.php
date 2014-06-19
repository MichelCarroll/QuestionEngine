<?php

require('bootstrap.php');

use Mandango\Mondator\Mondator;
use Mandango\Extension\Core;

$classes = array(
    'Model\Question' => array(
        'fields' => array(
            'name'   => 'string',
            'title' => 'string',
            'type'   => 'string',
            'survey'   => 'string',
            'order'   => 'integer',
            'options' => 'raw',
            'choices' => 'raw'
        )
    ),
    'Model\Answer' => array(
        'fields' => array(
            'value' => 'raw'
        ),
        'referencesOne' => array(
            'question' => array('class' => 'Model\Question'),
        ),
    )
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
