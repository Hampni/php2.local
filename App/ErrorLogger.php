<?php

namespace App;

class ErrorLogger
{

    public static function addError(\Exception $exception) {

        $fileContent[] = implode('   ',
            [
                date("d-m-Y H:i:s"),
                $exception->getMessage(),
                $exception->getFile(),
                'line - ' . $exception->getLine()
            ]);

        file_put_contents(__DIR__ . '/log.txt',"\n". implode("\n",$fileContent),FILE_APPEND);

    }

}