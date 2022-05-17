<?php

namespace App;

class Config extends Singleton
{

    public $data;

    /**
     *  connection to database
     */
    public function __construct()
    {
        if (!file_exists(__DIR__ . '/../config.php')) {
            throw new DbExeption('Файл конфигурации не существует!');
        } else {

            $this->data =  require __DIR__ . '/../config.php';
        }

    }

}