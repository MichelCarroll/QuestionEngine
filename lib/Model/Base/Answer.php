<?php

namespace Model\Base;

/**
 * Base class of Model\Answer document.
 */
abstract class Answer extends \Mandango\Document\Document
{
    /**
     * Initializes the document defaults.
     */
    public function initializeDefaults()
    {
    }

    /**
     * Set the document data (hydrate).
     *
     * @param array $data  The document data.
     * @param bool  $clean Whether clean the document.
     *
     * @return \Model\Answer The document (fluent interface).
     */
    public function setDocumentData($data, $clean = false)
    {
        if ($clean) {
            $this->data = array();
            $this->fieldsModified = array();
        }

        if (isset($data['_query_hash'])) {
            $this->addQueryHash($data['_query_hash']);
        }
        if (isset($data['_id'])) {
            $this->setId($data['_id']);
            $this->setIsNew(false);
        }
        if (isset($data['value'])) {
            $this->data['fields']['value'] = $data['value'];
        } elseif (isset($data['_fields']['value'])) {
            $this->data['fields']['value'] = null;
        }
        if (isset($data['question'])) {
            $this->data['fields']['question_reference_field'] = $data['question'];
        } elseif (isset($data['_fields']['question'])) {
            $this->data['fields']['question_reference_field'] = null;
        }

        return $this;
    }

    /**
     * Set the "value" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Answer The document (fluent interface).
     */
    public function setValue($value)
    {
        if (!isset($this->data['fields']['value'])) {
            if (!$this->isNew()) {
                $this->getValue();
                if ($this->isFieldEqualTo('value', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['value'] = null;
                $this->data['fields']['value'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('value', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['value']) && !array_key_exists('value', $this->fieldsModified)) {
            $this->fieldsModified['value'] = $this->data['fields']['value'];
        } elseif ($this->isFieldModifiedEqualTo('value', $value)) {
            unset($this->fieldsModified['value']);
        }

        $this->data['fields']['value'] = $value;

        return $this;
    }

    /**
     * Returns the "value" field.
     *
     * @return mixed The $name field.
     */
    public function getValue()
    {
        if (!isset($this->data['fields']['value'])) {
            if ($this->isNew()) {
                $this->data['fields']['value'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('value', $this->data['fields'])) {
                $this->addFieldCache('value');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('value' => 1));
                if (isset($data['value'])) {
                    $this->data['fields']['value'] = $data['value'];
                } else {
                    $this->data['fields']['value'] = null;
                }
            }
        }

        return $this->data['fields']['value'];
    }

    /**
     * Set the "question_reference_field" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Answer The document (fluent interface).
     */
    public function setQuestion_reference_field($value)
    {
        if (!isset($this->data['fields']['question_reference_field'])) {
            if (!$this->isNew()) {
                $this->getQuestion_reference_field();
                if ($this->isFieldEqualTo('question_reference_field', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['question_reference_field'] = null;
                $this->data['fields']['question_reference_field'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('question_reference_field', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['question_reference_field']) && !array_key_exists('question_reference_field', $this->fieldsModified)) {
            $this->fieldsModified['question_reference_field'] = $this->data['fields']['question_reference_field'];
        } elseif ($this->isFieldModifiedEqualTo('question_reference_field', $value)) {
            unset($this->fieldsModified['question_reference_field']);
        }

        $this->data['fields']['question_reference_field'] = $value;

        return $this;
    }

    /**
     * Returns the "question_reference_field" field.
     *
     * @return mixed The $name field.
     */
    public function getQuestion_reference_field()
    {
        if (!isset($this->data['fields']['question_reference_field'])) {
            if ($this->isNew()) {
                $this->data['fields']['question_reference_field'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('question_reference_field', $this->data['fields'])) {
                $this->addFieldCache('question');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('question' => 1));
                if (isset($data['question'])) {
                    $this->data['fields']['question_reference_field'] = $data['question'];
                } else {
                    $this->data['fields']['question_reference_field'] = null;
                }
            }
        }

        return $this->data['fields']['question_reference_field'];
    }

    private function isFieldEqualTo($field, $otherValue)
    {
        $value = $this->data['fields'][$field];

        return $this->isFieldValueEqualTo($value, $otherValue);
    }

    private function isFieldModifiedEqualTo($field, $otherValue)
    {
        $value = $this->fieldsModified[$field];

        return $this->isFieldValueEqualTo($value, $otherValue);
    }

    protected function isFieldValueEqualTo($value, $otherValue)
    {
        if (is_object($value)) {
            return $value == $otherValue;
        }

        return $value === $otherValue;
    }

    /**
     * Set the "question" reference.
     *
     * @param \Model\Question|null $value The reference, or null.
     *
     * @return \Model\Answer The document (fluent interface).
     *
     * @throws \InvalidArgumentException If the class is not an instance of Model\Question.
     */
    public function setQuestion($value)
    {
        if (null !== $value && !$value instanceof \Model\Question) {
            throw new \InvalidArgumentException('The "question" reference is not an instance of Model\Question.');
        }

        $this->setQuestion_reference_field((null === $value || $value->isNew()) ? null : $value->getId());

        $this->data['referencesOne']['question'] = $value;

        return $this;
    }

    /**
     * Returns the "question" reference.
     *
     * @return \Model\Question|null The reference or null if it does not exist.
     */
    public function getQuestion()
    {
        if (!isset($this->data['referencesOne']['question'])) {
            if (!$this->isNew()) {
                $this->addReferenceCache('question');
            }
            if (!$id = $this->getQuestion_reference_field()) {
                return null;
            }
            if (!$document = $this->getMandango()->getRepository('Model\Question')->findOneById($id)) {
                throw new \RuntimeException('The reference "question" does not exist.');
            }
            $this->data['referencesOne']['question'] = $document;
        }

        return $this->data['referencesOne']['question'];
    }

    /**
     * Process onDelete.
     */
    public function processOnDelete()
    {
    }

    private function processOnDeleteCascade($class, array $criteria)
    {
        $repository = $this->getMandango()->getRepository($class);
        $documents = $repository->createQuery($criteria)->all();
        if (count($documents)) {
            $repository->delete($documents);
        }
    }

    private function processOnDeleteUnset($class, array $criteria, array $update)
    {
        $this->getMandango()->getRepository($class)->update($criteria, $update, array('multiple' => true));
    }

    /**
     * Update the value of the reference fields.
     */
    public function updateReferenceFields()
    {
        if (isset($this->data['referencesOne']['question']) && !isset($this->data['fields']['question_reference_field'])) {
            $this->setQuestion_reference_field($this->data['referencesOne']['question']->getId());
        }
    }

    /**
     * Save the references.
     */
    public function saveReferences()
    {
        if (isset($this->data['referencesOne']['question'])) {
            $this->data['referencesOne']['question']->save();
        }
    }

    /**
     * Set a document data value by data name as string.
     *
     * @param string $name  The data name.
     * @param mixed  $value The value.
     *
     * @return mixed the data name setter return value.
     *
     * @throws \InvalidArgumentException If the data name is not valid.
     */
    public function set($name, $value)
    {
        if ('value' == $name) {
            return $this->setValue($value);
        }
        if ('question_reference_field' == $name) {
            return $this->setQuestion_reference_field($value);
        }
        if ('question' == $name) {
            return $this->setQuestion($value);
        }

        throw new \InvalidArgumentException(sprintf('The document data "%s" is not valid.', $name));
    }

    /**
     * Returns a document data by data name as string.
     *
     * @param string $name The data name.
     *
     * @return mixed The data name getter return value.
     *
     * @throws \InvalidArgumentException If the data name is not valid.
     */
    public function get($name)
    {
        if ('value' == $name) {
            return $this->getValue();
        }
        if ('question_reference_field' == $name) {
            return $this->getQuestion_reference_field();
        }
        if ('question' == $name) {
            return $this->getQuestion();
        }

        throw new \InvalidArgumentException(sprintf('The document data "%s" is not valid.', $name));
    }

    /**
     * Imports data from an array.
     *
     * @param array $array An array.
     *
     * @return \Model\Answer The document (fluent interface).
     */
    public function fromArray(array $array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        }
        if (isset($array['value'])) {
            $this->setValue($array['value']);
        }
        if (isset($array['question_reference_field'])) {
            $this->setQuestion_reference_field($array['question_reference_field']);
        }
        if (isset($array['question'])) {
            $this->setQuestion($array['question']);
        }

        return $this;
    }

    /**
     * Export the document data to an array.
     *
     * @param Boolean $withReferenceFields Whether include the fields of references or not (false by default).
     *
     * @return array An array with the document data.
     */
    public function toArray($withReferenceFields = false)
    {
        $array = array('id' => $this->getId());

        $array['value'] = $this->getValue();
        if ($withReferenceFields) {
            $array['question_reference_field'] = $this->getQuestion_reference_field();
        }

        return $array;
    }

    /**
     * Query for save.
     */
    public function queryForSave()
    {
        $isNew = $this->isNew();
        $query = array();
        $reset = false;

        if (isset($this->data['fields'])) {
            if ($isNew || $reset) {
                if (isset($this->data['fields']['value'])) {
                    $query['value'] = $this->data['fields']['value'];
                }
                if (isset($this->data['fields']['question_reference_field'])) {
                    $query['question'] = $this->data['fields']['question_reference_field'];
                }
            } else {
                if (isset($this->data['fields']['value']) || array_key_exists('value', $this->data['fields'])) {
                    $value = $this->data['fields']['value'];
                    $originalValue = $this->getOriginalFieldValue('value');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['value'] = $this->data['fields']['value'];
                        } else {
                            $query['$unset']['value'] = 1;
                        }
                    }
                }
                if (isset($this->data['fields']['question_reference_field']) || array_key_exists('question_reference_field', $this->data['fields'])) {
                    $value = $this->data['fields']['question_reference_field'];
                    $originalValue = $this->getOriginalFieldValue('question_reference_field');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['question'] = $this->data['fields']['question_reference_field'];
                        } else {
                            $query['$unset']['question'] = 1;
                        }
                    }
                }
            }
        }
        if (true === $reset) {
            $reset = 'deep';
        }

        return $query;
    }
}