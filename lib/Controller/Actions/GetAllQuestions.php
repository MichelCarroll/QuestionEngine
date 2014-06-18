<?php

namespace Controller\Actions;

use Persistence\RepositoryFetcher;

/**
 * Description of GetFirstQuestion
 *
 * @author mcarroll
 */
class GetAllQuestions extends \Controller\AbstractController 
{

    public function execute()
    {
        $surveyName = $this->getParameter('survey');
        
        $questions = RepositoryFetcher::get('Question')
            ->createQuery(array('survey' => $surveyName))
            ->sort(array('order' => 1))
            ->all();
        
        /* @var $question \Model\Question */      
        $questionArray = array();
        foreach($questions as $question) {
            $questionArray[$question->getName()] = $question->toArray();
        }
         
        return array('questions' => $questionArray);
    }
    
}
