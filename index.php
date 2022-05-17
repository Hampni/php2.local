<?php
declare(strict_types=1);
require __DIR__ . '/autoload.php';


$params = explode('/', $_SERVER['REQUEST_URI']);
$classes = explode('?', implode($params));


$ctrl =!empty($classes[0]) ? ucfirst($classes[0]) : 'Index';
$class = '\App\Controllers\\' . $ctrl;


$controller = new $class;

try {
    $controller();
} catch (\App\Exeptions\DbExeption $db) {
    echo $db->getMessage();
}
