<?php

namespace App;

class Singleton
{

    private static $instance = null;


    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

}
