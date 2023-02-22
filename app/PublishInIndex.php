<?php

namespace App;

class PublishInIndex extends Validator
{

    private $data;
    private $errorsPublishInIndex = [];
    private $publish_in_index = 'publish_in_index';
    public $validPublishInIndex = true;

    public function __construct($publish_in_index)
    {
        $this->data = $publish_in_index;
    }

    public function validate()
    {
        if (empty($this->data['publish_in_index'])) {
            $this->validPublishInIndex = false;
            $this->addPublishInIndexError('publish_in_index', 'The publish field cannot be empty');
        }
        return $this->errorsPublishInIndex;
    }

    private function addPublishInIndexError($key, $val)
    {
        $this->errorsPublishInIndex[$key] = $val;
    }
}