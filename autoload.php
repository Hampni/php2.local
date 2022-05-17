<?php

 spl_autoload_register( function ($classname) {
    include __DIR__ . '/' . str_replace('\\', '/', $classname . '.php');
 });
