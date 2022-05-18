<?php
declare(strict_types=1);
require __DIR__ . '/../autoload.php';


$params = explode('/', strtok($_SERVER['REQUEST_URI'], '?'));

if (isset($_GET['id']) || isset($_GET['title']) || isset($_GET['contents']) || isset($_GET['author_id'])) {
    $ctrl = !empty($params[3]) ? ucfirst($params[3]) : 'AdminPanel';
    $class = '\App\Controllers\Admin\\' . $ctrl;
    $controller = new $class;

    try {
        $controller();
    } catch (\App\Exeptions\Error404Exeption $exeption404) {
        include __DIR__ . '/../App/Templates/ExeptionTemplates/error404.php';
        \App\ErrorLogger::addError($exeption404);
        die();
    }

}


$controller = new \App\Controllers\AdminPanel();
$controller->password = '2481632';

try {

    $controller();

} catch (\App\Exeptions\DbExeption $exeptionDb) {
    include __DIR__ . '/../App/Templates/ExeptionTemplates/DbExeption.php';
    \App\ErrorLogger::addError($exeptionDb);
}
