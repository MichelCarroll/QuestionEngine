<?php

namespace Questionnaire\Validation\Strategy;

use Model\Question;
use Model\Answer;

/**
 * @author mcarroll
 */
class Multiple implements IStrategy 
{
    
    public function validate(Question $question, Answer $answer) 
    {
        $value = (int) $answer->getValue();
        $choices = $question->getChoices();
              
        if(isset($choices[$value])) {
            return true;
        }
        
    }
    
}
