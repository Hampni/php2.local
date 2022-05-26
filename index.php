<?php
declare(strict_types=1);

require __DIR__ . '/autoload.php';


$params = explode('/', $_SERVER['REQUEST_URI']);
$classes = explode('?', implode($params));


$ctrl = !empty($classes[0]) ? ucfirst($classes[0]) : 'Index';
$class = '\App\Controllers\\' . $ctrl;


$controller = new $class;
try {

    $controller();

} catch (\App\Exeptions\DbExeption $dbExeption) {
    include __DIR__ . '/App/Templates/ExeptionTemplates/DbExeption.php';
    \App\ErrorLogger::addError($dbExeption);

} catch (\App\Exeptions\Error404Exeption $error404Exeption) {
    include __DIR__ . '/App/Templates/ExeptionTemplates/error404.php';
    \App\ErrorLogger::addError($error404Exeption);
    die();
}
