<?php

namespace App;

class PublishInIndex extends Validator
{

    private $data;
    private $errorsPublishInIndex = '';
    private $publish_in_index = 'publish_in_index';
    public $validPublishInIndex = true;

    public function __construct($publish_in_index)
    {
        $this->data = $publish_in_index;
    }

    public function validate()
    {
        if (empty($this->data['publish_in_index'])) {
            return $this->validPublishInIndex = false;
        }
        return $this->validPublishInIndex;
    }

    public function addPublishInIndexError()
    {
        return $this->errorsPublishInIndex = 'The publish field cannot be empty';
    }
}