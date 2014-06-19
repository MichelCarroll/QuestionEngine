<?php

namespace Questionnaire\Validation\Strategy;

use Model\Question;
use Model\Answer;

/**
 * @author mcarroll
 */
class Pie implements IStrategy 
{
    
    public function validate(Question $question, Answer $answer) 
    {
        $value = $answer->getValue();
        $choices = $question->getChoices();
        
        if(!is_array($value)) {
            return false;
        }
        
        $sliceKeys = array_keys($value);
        $choiceIds = array_keys($choices);
        
        $sum = 0;
        
        foreach($choiceIds as $choiceId) {
            if(!in_array($choiceId, $sliceKeys)) {
                return false;
            }
            $sum += (int) $value[$choiceId];
        }
        
        
        if($sum == 0) {
            return false;
        }
        
        return true;
    }
    
}
