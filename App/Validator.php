<?php

namespace App;

use Exception;

class Validator
{

    public function validateId($id) : bool
    {
        if (is_numeric($id)) {
            return true;
        } else {
            throw new \Exception('Not valid id');
        }
    }
    public function validateTitle($title) : bool
    {
        if (!empty($title)) {
            return true;
        } else {
            throw new \Exception('Not valid title');
        }
    }
    public function validateContents($contents) : bool
    {
        if (!empty($contents)) {
            return true;
        } else {
            throw new \Exception('Not valid contents');
        }
    }
    public function validateAuthorId($author_id) : bool
    {
        if (!empty($author_id)) {
            return true;
        } else {
            throw new \Exception('Not valid author');
        }
    }

}