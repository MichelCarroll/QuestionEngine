<?php

require('bootstrap.php');

use Symfony\Component\Yaml\Yaml;
use Persistence\RepositoryFetcher;
use Persistence\MongoManager;

$testData = Yaml::parse(file_get_contents(CONFIG_DIR.'/test_data.yml'));
$mandango = MongoManager::getInstance();

foreach($testData as $modelName => $instanceDatas) {
    /* @var $repository \Mandango\Repository */
    $repository = RepositoryFetcher::get($modelName);
    $repository->remove();
    
    foreach($instanceDatas as $data) {
        /* @var $document \Mandango\Document\Document */
        $classname = '\\Model\\'.$modelName;
        $document = new $classname($mandango);
        $document->setDocumentData($data);
        if(isset($data['references'])) {
            foreach($data['references'] as $refModel => $reference) {
                /* @var $refRep \Mandango\Repository */
                $refRep = RepositoryFetcher::get($refModel);
                $refMod = $refRep->createQuery(array('name' => $reference['name']))->one();
                $funcName = 'set'.ucwords($reference['field']);
                $document->$funcName($refMod);
            }
        }
        $document->save();
    }
}