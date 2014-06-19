<?php

namespace Questionnaire\Validation\Strategy;

use Model\Question;
use Model\Answer;

/**
 * @author mcarroll
 */
class Boolean implements IStrategy 
{
    
    public function validate(Question $question, Answer $answer) 
    {
        $value = $answer->getValue();
        
        if(is_int($value) && in_array($value, array(0,1))) {
            return true;
        }
        
        if(is_string($value) && in_array($value, array("0", "1"))) {
            return true;
        }
    }
    
}
