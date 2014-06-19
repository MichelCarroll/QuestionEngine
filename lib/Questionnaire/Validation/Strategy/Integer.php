<?php

namespace Questionnaire\Validation\Strategy;

use Model\Question;
use Model\Answer;

/**
 * @author mcarroll
 */
class Integer implements IStrategy 
{
    
    public function validate(Question $question, Answer $answer) 
    {
        $value = (int) $answer->getValue();
        $options = $question->getOptions();
        
        if(!is_array($options)) {
            return true;
        }
        
        if(isset($options['min']) && $value < $options['min']) {
            return false;
        }
        
        if(isset($options['max']) && $value > $options['max']) {
            return false;
        }
        
        return true;
    }
    
}
