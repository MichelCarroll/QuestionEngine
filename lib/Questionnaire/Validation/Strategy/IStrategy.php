<?php

namespace Questionnaire\Validation\Strategy;

use Model\Question;
use Model\Answer;

/**
 *
 * @author mcarroll
 */
interface IStrategy 
{
    
    public function validate(Question $question, Answer $answer) ;
    
}
