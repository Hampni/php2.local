<?php

namespace App\Models;

interface SetGetReadInterface
{

    public function __set($key,$value);

    public function __get($key);

    public function __isset($key);

}