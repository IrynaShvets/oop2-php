<?php

namespace App;

class Content extends Validator
{
    private $data;
    private $errorsContent = '';
    private $content = 'content';
    public $validContent = true;

    public function __construct($content)
    {
        $this->data = $content;
    }

    public function validate()
    {
        if (isset($this->data['content'])) {
            if (strlen($this->data['content']) > 30000) {
                $this->validContent = false;
            }
        }
        return $this->validContent;
    }

    public function addContentError()
    {
        return $this->errorsContent = 'The content field must not exceed 30,000 characters';
    }
}