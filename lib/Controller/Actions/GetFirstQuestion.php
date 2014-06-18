<?php

namespace Controller\Actions;

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
    }
    
}
