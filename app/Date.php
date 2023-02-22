<?php

namespace App;

use \DateTime;

class Date extends Validator
{
    private $data;
    private $errorsDate = [];
    private $date = 'date';

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
                $this->addDateError('date', 'The publication date must not be earlier than the current date');
            }
        }
        return $this->errorsDate;
    }

    private function addDateError($key, $val)
    {
        $this->errorsDate[$key] = $val;
    }
}