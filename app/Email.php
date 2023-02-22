<?php

namespace App;

class Email extends Validator
{
    private $data;
    private $errorsEmail = [];
    private $email = 'email';
    public $validEmail = true;

    public function __construct($email)
    {
        $this->data = $email;
    }

    public function validate()
    {
        if (empty(trim($this->data['email']))) {
            $this->validEmail = false;
            $this->addEmailError('email', 'Email cannot be empty');
        } else {
            if (!filter_var(trim($this->data['email']), FILTER_VALIDATE_EMAIL)) {
                $this->validEmail = false;
                $this->addEmailError('email', 'Email must be a valid email address');
            }
        }
        return $this->errorsEmail;
    }

    private function addEmailError($key, $val)
    {
        $this->errorsEmail[$key] = $val;
    }
}



