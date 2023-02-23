<?php

namespace App;

class Title extends Validator
{
    private $data;
    private $errorsTitle = '';
    private $title = 'title';
    public $validTitle = true;

    public function __construct($title)
    {
        $this->data = $title;
    }

    public function validate()
    {
        if (empty($this->data['title']) || strlen($this->data['title']) < 3 || strlen($this->data['title']) > 255) {
            return $this->validTitle = false;
        }
        return $this->validTitle;
    }

    public function addTitleError()
    {
        return $this->errorsTitle = 'The header field must not be empty, not less than three characters, not more than 255 characters';
    }
}
