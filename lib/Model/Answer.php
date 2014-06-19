<?php

namespace Model;

/**
 * Model\Answer document.
 */
class Answer extends \Model\Base\Answer
{
    const DEFAULT_CHOICE = 1;
    
    public function setValue($value)
    {
        if(!is_array($value)) {
            return parent::setValue((int) $value);
        }
        return parent::setValue($value);
    }
}