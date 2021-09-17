<?php
session_start();

function dd($var)
{
    echo '<pre>';
    print_r($var);
    die;
}

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}
else {
    $controller = 'Category';
    $action = 'index';
}

require_once "controllers/{$controller}Controller.php";
$modelClass = "{$controller}Controller";
$model = new $modelClass;
$model->$action();