<?php

namespace Controller\Actions;

use Persistence\RepositoryFetcher;

/**
 * Description of GetFirstQuestion
 *
 * @author mcarroll
 */
class GetFirstQuestion extends \Controller\AbstractController 
{

    public function execute()
    {
        $surveyName = $this->getParameter('survey_name');
        
        $question = RepositoryFetcher::get('Question')
            ->createQuery(array('survey' => $surveyName))
            ->sort(array('order' => 1))
            ->one();
        
        if(!$question) {
            throw new \InvalidArgumentException('No such question');
        }
        
        /* @var $question \Model\Question */       
        return array('question' => $question->toArray());
    }
    
}
