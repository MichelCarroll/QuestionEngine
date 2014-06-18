<?php

namespace Model\Base;

/**
 * Base class of Model\Question document.
 */
abstract class Question extends \Mandango\Document\Document
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
     * @return \Model\Question The document (fluent interface).
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
        if (isset($data['name'])) {
            $this->data['fields']['name'] = (string) $data['name'];
        } elseif (isset($data['_fields']['name'])) {
            $this->data['fields']['name'] = null;
        }
        if (isset($data['title'])) {
            $this->data['fields']['title'] = (string) $data['title'];
        } elseif (isset($data['_fields']['title'])) {
            $this->data['fields']['title'] = null;
        }
        if (isset($data['type'])) {
            $this->data['fields']['type'] = (string) $data['type'];
        } elseif (isset($data['_fields']['type'])) {
            $this->data['fields']['type'] = null;
        }
        if (isset($data['survey'])) {
            $this->data['fields']['survey'] = (string) $data['survey'];
        } elseif (isset($data['_fields']['survey'])) {
            $this->data['fields']['survey'] = null;
        }
        if (isset($data['order'])) {
            $this->data['fields']['order'] = (int) $data['order'];
        } elseif (isset($data['_fields']['order'])) {
            $this->data['fields']['order'] = null;
        }
        if (isset($data['choices'])) {
            $this->data['fields']['choices'] = $data['choices'];
        } elseif (isset($data['_fields']['choices'])) {
            $this->data['fields']['choices'] = null;
        }

        return $this;
    }

    /**
     * Set the "name" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Question The document (fluent interface).
     */
    public function setName($value)
    {
        if (!isset($this->data['fields']['name'])) {
            if (!$this->isNew()) {
                $this->getName();
                if ($this->isFieldEqualTo('name', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['name'] = null;
                $this->data['fields']['name'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('name', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['name']) && !array_key_exists('name', $this->fieldsModified)) {
            $this->fieldsModified['name'] = $this->data['fields']['name'];
        } elseif ($this->isFieldModifiedEqualTo('name', $value)) {
            unset($this->fieldsModified['name']);
        }

        $this->data['fields']['name'] = $value;

        return $this;
    }

    /**
     * Returns the "name" field.
     *
     * @return mixed The $name field.
     */
    public function getName()
    {
        if (!isset($this->data['fields']['name'])) {
            if ($this->isNew()) {
                $this->data['fields']['name'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('name', $this->data['fields'])) {
                $this->addFieldCache('name');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('name' => 1));
                if (isset($data['name'])) {
                    $this->data['fields']['name'] = (string) $data['name'];
                } else {
                    $this->data['fields']['name'] = null;
                }
            }
        }

        return $this->data['fields']['name'];
    }

    /**
     * Set the "title" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Question The document (fluent interface).
     */
    public function setTitle($value)
    {
        if (!isset($this->data['fields']['title'])) {
            if (!$this->isNew()) {
                $this->getTitle();
                if ($this->isFieldEqualTo('title', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['title'] = null;
                $this->data['fields']['title'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('title', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['title']) && !array_key_exists('title', $this->fieldsModified)) {
            $this->fieldsModified['title'] = $this->data['fields']['title'];
        } elseif ($this->isFieldModifiedEqualTo('title', $value)) {
            unset($this->fieldsModified['title']);
        }

        $this->data['fields']['title'] = $value;

        return $this;
    }

    /**
     * Returns the "title" field.
     *
     * @return mixed The $name field.
     */
    public function getTitle()
    {
        if (!isset($this->data['fields']['title'])) {
            if ($this->isNew()) {
                $this->data['fields']['title'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('title', $this->data['fields'])) {
                $this->addFieldCache('title');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('title' => 1));
                if (isset($data['title'])) {
                    $this->data['fields']['title'] = (string) $data['title'];
                } else {
                    $this->data['fields']['title'] = null;
                }
            }
        }

        return $this->data['fields']['title'];
    }

    /**
     * Set the "type" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Question The document (fluent interface).
     */
    public function setType($value)
    {
        if (!isset($this->data['fields']['type'])) {
            if (!$this->isNew()) {
                $this->getType();
                if ($this->isFieldEqualTo('type', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['type'] = null;
                $this->data['fields']['type'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('type', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['type']) && !array_key_exists('type', $this->fieldsModified)) {
            $this->fieldsModified['type'] = $this->data['fields']['type'];
        } elseif ($this->isFieldModifiedEqualTo('type', $value)) {
            unset($this->fieldsModified['type']);
        }

        $this->data['fields']['type'] = $value;

        return $this;
    }

    /**
     * Returns the "type" field.
     *
     * @return mixed The $name field.
     */
    public function getType()
    {
        if (!isset($this->data['fields']['type'])) {
            if ($this->isNew()) {
                $this->data['fields']['type'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('type', $this->data['fields'])) {
                $this->addFieldCache('type');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('type' => 1));
                if (isset($data['type'])) {
                    $this->data['fields']['type'] = (string) $data['type'];
                } else {
                    $this->data['fields']['type'] = null;
                }
            }
        }

        return $this->data['fields']['type'];
    }

    /**
     * Set the "survey" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Question The document (fluent interface).
     */
    public function setSurvey($value)
    {
        if (!isset($this->data['fields']['survey'])) {
            if (!$this->isNew()) {
                $this->getSurvey();
                if ($this->isFieldEqualTo('survey', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['survey'] = null;
                $this->data['fields']['survey'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('survey', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['survey']) && !array_key_exists('survey', $this->fieldsModified)) {
            $this->fieldsModified['survey'] = $this->data['fields']['survey'];
        } elseif ($this->isFieldModifiedEqualTo('survey', $value)) {
            unset($this->fieldsModified['survey']);
        }

        $this->data['fields']['survey'] = $value;

        return $this;
    }

    /**
     * Returns the "survey" field.
     *
     * @return mixed The $name field.
     */
    public function getSurvey()
    {
        if (!isset($this->data['fields']['survey'])) {
            if ($this->isNew()) {
                $this->data['fields']['survey'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('survey', $this->data['fields'])) {
                $this->addFieldCache('survey');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('survey' => 1));
                if (isset($data['survey'])) {
                    $this->data['fields']['survey'] = (string) $data['survey'];
                } else {
                    $this->data['fields']['survey'] = null;
                }
            }
        }

        return $this->data['fields']['survey'];
    }

    /**
     * Set the "order" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Question The document (fluent interface).
     */
    public function setOrder($value)
    {
        if (!isset($this->data['fields']['order'])) {
            if (!$this->isNew()) {
                $this->getOrder();
                if ($this->isFieldEqualTo('order', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['order'] = null;
                $this->data['fields']['order'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('order', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['order']) && !array_key_exists('order', $this->fieldsModified)) {
            $this->fieldsModified['order'] = $this->data['fields']['order'];
        } elseif ($this->isFieldModifiedEqualTo('order', $value)) {
            unset($this->fieldsModified['order']);
        }

        $this->data['fields']['order'] = $value;

        return $this;
    }

    /**
     * Returns the "order" field.
     *
     * @return mixed The $name field.
     */
    public function getOrder()
    {
        if (!isset($this->data['fields']['order'])) {
            if ($this->isNew()) {
                $this->data['fields']['order'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('order', $this->data['fields'])) {
                $this->addFieldCache('order');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('order' => 1));
                if (isset($data['order'])) {
                    $this->data['fields']['order'] = (int) $data['order'];
                } else {
                    $this->data['fields']['order'] = null;
                }
            }
        }

        return $this->data['fields']['order'];
    }

    /**
     * Set the "choices" field.
     *
     * @param mixed $value The value.
     *
     * @return \Model\Question The document (fluent interface).
     */
    public function setChoices($value)
    {
        if (!isset($this->data['fields']['choices'])) {
            if (!$this->isNew()) {
                $this->getChoices();
                if ($this->isFieldEqualTo('choices', $value)) {
                    return $this;
                }
            } else {
                if (null === $value) {
                    return $this;
                }
                $this->fieldsModified['choices'] = null;
                $this->data['fields']['choices'] = $value;
                return $this;
            }
        } elseif ($this->isFieldEqualTo('choices', $value)) {
            return $this;
        }

        if (!isset($this->fieldsModified['choices']) && !array_key_exists('choices', $this->fieldsModified)) {
            $this->fieldsModified['choices'] = $this->data['fields']['choices'];
        } elseif ($this->isFieldModifiedEqualTo('choices', $value)) {
            unset($this->fieldsModified['choices']);
        }

        $this->data['fields']['choices'] = $value;

        return $this;
    }

    /**
     * Returns the "choices" field.
     *
     * @return mixed The $name field.
     */
    public function getChoices()
    {
        if (!isset($this->data['fields']['choices'])) {
            if ($this->isNew()) {
                $this->data['fields']['choices'] = null;
            } elseif (!isset($this->data['fields']) || !array_key_exists('choices', $this->data['fields'])) {
                $this->addFieldCache('choices');
                $data = $this->getRepository()->getCollection()->findOne(array('_id' => $this->getId()), array('choices' => 1));
                if (isset($data['choices'])) {
                    $this->data['fields']['choices'] = $data['choices'];
                } else {
                    $this->data['fields']['choices'] = null;
                }
            }
        }

        return $this->data['fields']['choices'];
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
        if ('name' == $name) {
            return $this->setName($value);
        }
        if ('title' == $name) {
            return $this->setTitle($value);
        }
        if ('type' == $name) {
            return $this->setType($value);
        }
        if ('survey' == $name) {
            return $this->setSurvey($value);
        }
        if ('order' == $name) {
            return $this->setOrder($value);
        }
        if ('choices' == $name) {
            return $this->setChoices($value);
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
        if ('name' == $name) {
            return $this->getName();
        }
        if ('title' == $name) {
            return $this->getTitle();
        }
        if ('type' == $name) {
            return $this->getType();
        }
        if ('survey' == $name) {
            return $this->getSurvey();
        }
        if ('order' == $name) {
            return $this->getOrder();
        }
        if ('choices' == $name) {
            return $this->getChoices();
        }

        throw new \InvalidArgumentException(sprintf('The document data "%s" is not valid.', $name));
    }

    /**
     * Imports data from an array.
     *
     * @param array $array An array.
     *
     * @return \Model\Question The document (fluent interface).
     */
    public function fromArray(array $array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        }
        if (isset($array['name'])) {
            $this->setName($array['name']);
        }
        if (isset($array['title'])) {
            $this->setTitle($array['title']);
        }
        if (isset($array['type'])) {
            $this->setType($array['type']);
        }
        if (isset($array['survey'])) {
            $this->setSurvey($array['survey']);
        }
        if (isset($array['order'])) {
            $this->setOrder($array['order']);
        }
        if (isset($array['choices'])) {
            $this->setChoices($array['choices']);
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

        $array['name'] = $this->getName();
        $array['title'] = $this->getTitle();
        $array['type'] = $this->getType();
        $array['survey'] = $this->getSurvey();
        $array['order'] = $this->getOrder();
        $array['choices'] = $this->getChoices();

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
                if (isset($this->data['fields']['name'])) {
                    $query['name'] = (string) $this->data['fields']['name'];
                }
                if (isset($this->data['fields']['title'])) {
                    $query['title'] = (string) $this->data['fields']['title'];
                }
                if (isset($this->data['fields']['type'])) {
                    $query['type'] = (string) $this->data['fields']['type'];
                }
                if (isset($this->data['fields']['survey'])) {
                    $query['survey'] = (string) $this->data['fields']['survey'];
                }
                if (isset($this->data['fields']['order'])) {
                    $query['order'] = (int) $this->data['fields']['order'];
                }
                if (isset($this->data['fields']['choices'])) {
                    $query['choices'] = $this->data['fields']['choices'];
                }
            } else {
                if (isset($this->data['fields']['name']) || array_key_exists('name', $this->data['fields'])) {
                    $value = $this->data['fields']['name'];
                    $originalValue = $this->getOriginalFieldValue('name');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['name'] = (string) $this->data['fields']['name'];
                        } else {
                            $query['$unset']['name'] = 1;
                        }
                    }
                }
                if (isset($this->data['fields']['title']) || array_key_exists('title', $this->data['fields'])) {
                    $value = $this->data['fields']['title'];
                    $originalValue = $this->getOriginalFieldValue('title');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['title'] = (string) $this->data['fields']['title'];
                        } else {
                            $query['$unset']['title'] = 1;
                        }
                    }
                }
                if (isset($this->data['fields']['type']) || array_key_exists('type', $this->data['fields'])) {
                    $value = $this->data['fields']['type'];
                    $originalValue = $this->getOriginalFieldValue('type');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['type'] = (string) $this->data['fields']['type'];
                        } else {
                            $query['$unset']['type'] = 1;
                        }
                    }
                }
                if (isset($this->data['fields']['survey']) || array_key_exists('survey', $this->data['fields'])) {
                    $value = $this->data['fields']['survey'];
                    $originalValue = $this->getOriginalFieldValue('survey');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['survey'] = (string) $this->data['fields']['survey'];
                        } else {
                            $query['$unset']['survey'] = 1;
                        }
                    }
                }
                if (isset($this->data['fields']['order']) || array_key_exists('order', $this->data['fields'])) {
                    $value = $this->data['fields']['order'];
                    $originalValue = $this->getOriginalFieldValue('order');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['order'] = (int) $this->data['fields']['order'];
                        } else {
                            $query['$unset']['order'] = 1;
                        }
                    }
                }
                if (isset($this->data['fields']['choices']) || array_key_exists('choices', $this->data['fields'])) {
                    $value = $this->data['fields']['choices'];
                    $originalValue = $this->getOriginalFieldValue('choices');
                    if ($value !== $originalValue) {
                        if (null !== $value) {
                            $query['$set']['choices'] = $this->data['fields']['choices'];
                        } else {
                            $query['$unset']['choices'] = 1;
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