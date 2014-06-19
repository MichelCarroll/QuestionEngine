<?php

namespace Controller\Actions;

use Persistence\MongoManager;
use Persistence\RepositoryFetcher;
use InvalidArgumentException;
use Model\Answer;

class AnswerQuestion extends \Controller\AbstractController 
{

    public function execute()
    {
        $questionName = $this->getParameter('question_name');
        $value = $this->getParameter('value');
                        
        $question = RepositoryFetcher::get('Question')
            ->createQuery(array('name' => $questionName))
            ->one();
        
        if(!$question) {
            throw new InvalidArgumentException('No such question');
        }
                
        $answer = new Answer(MongoManager::getInstance());
        $answer->setQuestion($question);
        $answer->setValue($value);
        
        $validation = \Questionnaire\Validation\Factory::getStrategy($question);
        if(!$validation->validate($question, $answer)) {
            throw new InvalidArgumentException('Invalid answer');
        }
        
        $answer->save();

        return array('success');
    }
    
}
