<?php

namespace Questionnaire\Validation;

use Model\Question;

/**
 * @author mcarroll
 */
class Factory
{
    
    /**
     * 
     * @param \Model\Question $question
     * @return \Questionnaire\Validation\Strategy\IStrategy
     * @throws InvalidQuestionTypeException
     */
    public static function getStrategy(Question $question) {
        $type = $question->getType();
        $className = '\\Questionnaire\\Validation\\Strategy\\'.ucwords($type);
        
        if(!class_exists($className)) {
            throw new InvalidQuestionTypeException();
        }
        
        return new $className();
    }
    
}
