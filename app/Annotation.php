<?php

namespace App;

class Annotation extends Validator
{
    private $data;
    private $errorsAnnotation = [];
    private $annotation = 'annotation';
    public $validAnnotation = true;

    public function __construct($annotation)
    {
        $this->data = $annotation;
    }

    public function validate()
    {
        if (isset($this->data['annotation'])) {
            if (strlen($this->data['annotation']) > 500) {
                return $this->validAnnotation = false;
            }
        }
        return $this->validAnnotation;
    }

    public function addAnnotationError()
    {
        return $this->errorsAnnotation['annotation'] = 'The annotation field should not exceed 500 characters';
    }
}