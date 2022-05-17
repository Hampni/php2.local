<?php
declare(strict_types=1);
require __DIR__ . '/autoload.php';

$view = new \App\View();

$view->products = \App\Models\Product::findAll();

$contents = $view->render(__DIR__ . '/Templates/part3.php');
echo $contents;
