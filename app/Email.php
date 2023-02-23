<?php

namespace App;

class Email extends Validator
{
    private $data;
    private $errorsEmail = '';
    private $email = 'email';
    public $validEmail = true;

    public function __construct($email)
    {
        $this->data = $email;
    }

    public function validate()
    {
        if (empty(trim($this->data['email'])) && !filter_var(trim($this->data['email']), FILTER_VALIDATE_EMAIL)) {
            return $this->validEmail = false;
        }
        return $this->validEmail;
    }

    public function addEmailError()
    {
        return $this->errorsEmail = 'Email cannot be empty and must be a valid email address';
    }
}



