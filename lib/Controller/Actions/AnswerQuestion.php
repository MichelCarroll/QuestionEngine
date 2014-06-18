<?php

namespace Controller\Actions;

use Persistence\RepositoryFetcher;

class AnswerQuestion extends \Controller\AbstractController 
{

    public function execute()
    {
        $questionName = $this->getParameter('question_name');
        $answer = $this->getParameter('answer_value');
        
        $question = RepositoryFetcher::get('Question')
            ->createQuery(array('name' => $questionName))
            ->one();
        
        if(!$question) {
            throw new \InvalidArgumentException('No such question');
        }
         
        return array();
    }
    
}
