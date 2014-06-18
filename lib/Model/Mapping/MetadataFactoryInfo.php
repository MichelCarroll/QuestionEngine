<?php

namespace Model\Mapping;

class MetadataFactoryInfo
{
    public function getModelQuestionClass()
    {
        return array(
            'isEmbedded' => false,
            'mandango' => null,
            'connection' => '',
            'collection' => 'model_question',
            'inheritable' => false,
            'inheritance' => false,
            'fields' => array(
                'name' => array(
                    'type' => 'string',
                    'dbName' => 'name',
                ),
                'title' => array(
                    'type' => 'string',
                    'dbName' => 'title',
                ),
                'type' => array(
                    'type' => 'string',
                    'dbName' => 'type',
                ),
                'survey' => array(
                    'type' => 'string',
                    'dbName' => 'survey',
                ),
                'order' => array(
                    'type' => 'integer',
                    'dbName' => 'order',
                ),
            ),
            '_has_references' => false,
            'referencesOne' => array(

            ),
            'referencesMany' => array(

            ),
            'embeddedsOne' => array(

            ),
            'embeddedsMany' => array(

            ),
            'relationsOne' => array(

            ),
            'relationsManyOne' => array(

            ),
            'relationsManyMany' => array(

            ),
            'relationsManyThrough' => array(

            ),
            'indexes' => array(

            ),
            '_indexes' => array(

            ),
        );
    }
}