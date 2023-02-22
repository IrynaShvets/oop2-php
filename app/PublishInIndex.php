<?php

namespace App;

class PublishInIndex extends Validator
{

    private $data;
    private $errorsPublishInIndex = [];
    private $publish_in_index = 'publish_in_index';

    public function __construct($publish_in_index)
    {
        $this->data = $publish_in_index;
    }

    public function validate()
    {
        if (empty($this->data['publish_in_index'])) {
            $this->addPublishInIndexError('publish_in_index', 'Email cannot be empty');
        } else {
                if ($this->data['publish_in_index'] !== true || $this->data['publish_in_index'] !== false) {
                    $this->addPublishInIndexError('publish_in_index', "The publish field on the main must contain the value 'yes' or 'no'");
                }
        }
        return $this->errorsPublishInIndex;
    }

    private function addPublishInIndexError($key, $val)
    {
        $this->errorsPublishInIndex[$key] = $val;
    }
}