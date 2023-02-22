<?php

namespace App;

class Content extends Validator
{
    private $data;
    private $errorsContent = [];
    private $content = 'content';
    public $validContent = true;

    public function __construct($content)
    {
        $this->data = $content;
    }

    public function validate()
    {
        if (isset($this->data['content'])) {
            if (strlen($this->data['content']) > 500) {
                $this->validContent = false;
                $this->addContentError('content', 'The content field must not exceed 30,000 characters');
            }
        }
        return $this->errorsContent;
    }

    private function addContentError($key, $val)
    {
        $this->errorsContent[$key] = $val;
    }
}