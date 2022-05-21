<?php

namespace App\Exeptions;

use http\Exception;

class MultiExeption extends \Exception implements \Countable
{
    protected $errors = [];

    public function add(\Exception $exception)
    {
        $this->errors[] = $exception;
    }
    public function getAll()
    {
        return $this->errors;
    }

    public function count()
    {
        return count($this->errors);
    }
}