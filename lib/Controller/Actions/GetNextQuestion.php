<?php

namespace Controller\Actions;

use Persistence\RepositoryFetcher;

/**
 * Description of GetFirstQuestion
 *
 * @author mcarroll
 */
class GetNextQuestion extends \Controller\AbstractController 
{

    public function execute()
    {
        $questionName = $this->getParameter('question_name');
        
        $repo = RepositoryFetcher::get('Question');
        $question = $repo->createQuery(array('name' => $questionName))->one();
        
        if(!$question) {
            throw new \InvalidArgumentException('No question with name '.$questionName);
        }
        
        /* @var $question \Model\Question */       
        $nextQuestion = $repo
            ->createQuery(array(
                'survey' => $question->getSurvey(),
                'order' => array('$gt' => $question->getOrder())
            ))
            ->sort(array('order' => 1))
            ->one();
        
        if(!$nextQuestion) {
            return array('question' => null);
        }
        
        /* @var $question \Model\Question */       
        return array('question' => $nextQuestion->toArray());
    }
    
}
