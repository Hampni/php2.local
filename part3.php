<?php
declare(strict_types=1);
require __DIR__ . '/autoload.php';

/*$view = new \App\View();

$view->products = \App\Models\Product::findAll();

$contents = $view->render(__DIR__ . '/Templates/part3.php');
echo $contents;*/


$a = explode("\n",file_get_contents(__DIR__ . '/App/log.txt'));
var_dump($a);
$a[] = '444';
file_put_contents(__DIR__ . '/App/log.txt', implode("\n",$a));



