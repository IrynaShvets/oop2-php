<?php

namespace App;

class Title extends Validator
{
    private $data;
    private $errorsTitle = [];
    private $title = 'title';
    private $isValid = true;

    public function __construct($title)
    {
        $this->data = $title;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function validate()
    {
        if (empty($this->data['title'])) {
            $this->isValid = false;
            $this->addTitleError('title', 'Title cannot be empty');
            return false;
        } else {
            if (strlen($this->data['title']) < 3) {
                $this->isValid = false;
                $this->addTitleError('title', 'The header field must have at least three characters');
            }
            if (strlen($this->data['title']) > 255) {
                $this->isValid = false;
                $this->addTitleError('title', 'The header field must not exceed 255 characters');
            }
        }
        return $this->errorsTitle;
    }

    private function addTitleError($key, $val)
    {
        $this->errorsTitle[$key] = $val;
    }
}
