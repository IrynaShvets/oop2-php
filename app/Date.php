<?php

namespace App;

use \DateTime;

class Date extends Validator
{
    private $data;
    private $errorsDate = '';
    public $date = 'date';
    public $validDate = true;

    public function __construct($date)
    {
        $this->data = $date;
    }

    public function validate()
    {
        if (isset($this->data['date']) ) {
            $date1 = new DateTime("now");
            $date2 = new DateTime($this->data['date']);
            $diff = $date1 < $date2;
            if ((bool)($diff === true)) {
                return $this->validDate = false;
            }
        }
        return $this->validDate;
    }

    public function addDateError()
    {
        return $this->errorsDate = 'The publication date must not be earlier than the current date';
    }
}