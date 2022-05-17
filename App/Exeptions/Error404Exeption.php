<?php

namespace App\Exeptions;

class Error404Exeption extends \Exception
{
    public $message = 'Ошибка 404 - не найдено';
}