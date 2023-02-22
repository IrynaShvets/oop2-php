<?php

namespace App;

class Annotation extends Validator
{
    private $data;
    private $errorsAnnotation = [];
    private $annotation = 'annotation';

    public function __construct($annotation)
    {
        $this->data = $annotation;
    }

    public function validate()
    {
        if (isset($this->data['annotation'])) {
            if (strlen($this->data['annotation']) > 500) {
                $this->addAnnotationError('annotation', 'The annotation field should not exceed 500 characters');
            }
        }
        return $this->errorsAnnotation;
    }

    private function addAnnotationError($key, $val)
    {
        $this->errorsAnnotation[$key] = $val;
    }
}