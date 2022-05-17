<?php
declare(strict_types=1);
require __DIR__ . '/../autoload.php';


$params = explode('/', strtok($_SERVER['REQUEST_URI'], '?'));

if (isset($_GET['id']) || isset($_GET['deleteid']) || isset($_GET['title']) || isset($_GET['contents']) || isset($_GET['author'])) {
    $ctrl = !empty($params[3]) ? ucfirst($params[3]) : 'AdminPanel';
    $class = '\App\Controllers\Admin\\' . $ctrl;
    $controller = new $class;

    try {
        $controller();
    } catch (\App\Exeptions\Error404Exeption $exeption) {
        echo $exeption->message;
    }

}


$controller = new \App\Controllers\AdminPanel();
$controller->password = '2481632';

try {
    $controller();
} catch (\App\Exeptions\DbExeption $exeption) {
    echo $exeption->getMessage();
}
