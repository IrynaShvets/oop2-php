<?php

namespace App;

class Category extends Validator
{
    private $data;
    private $errorsCategory = [];
    private $category = 'category';
    public $validCategory = true;

    public function __construct($category)
    {
        $this->data = $category;
    }

    public function validate()
    {
        if (isset($this->data['category']) && empty($this->data['category'])) {
            $this->validCategory = false;
            $this->addCategoryError('category', 'The category field must be one of the values [1, 2, 3]');
        }
        return $this->errorsCategory;
    }

    private function addCategoryError($key, $val)
    {
        $this->errorsCategory[$key] = $val;
    }
}