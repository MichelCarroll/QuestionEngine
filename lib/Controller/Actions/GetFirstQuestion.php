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
        $surveyName = $this->getParameter('survey');
        
        $question = RepositoryFetcher::get('Question')
            ->createQuery(array('survey' => $surveyName))
            ->sort(array('order' => 1))
            ->one();
        
        /* @var $question \Model\Question */       
        return array('question' => $question->toArray());
    }
    
}
