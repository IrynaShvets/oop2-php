<?php

namespace App;

class Views extends Validator
{
    private $data;
    private $errorsViews = '';
    private $views = 'views';
    public $validViews = true;

    public function __construct($views)
    {
        $this->data = $views;
    }

    public function validate()
    {
        if (!empty($this->data['views'])) {

            if (!filter_var($this->data['views'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 0 , "max_range"=> 2147483647]]) !== false) {
               return $this->validViews = false;
            }
        }
        return $this->validViews;
    }

    public function addViewsError()
    {
        return $this->errorsViews = "The number of views must be a number, must not be negative, and must be within the size of UNSIGNED INT";
    }
}