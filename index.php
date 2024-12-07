<?php
session_start(); // Chỉ gọi session_start() một lần ở đây

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . '/app/controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $obj = new $controllerName();
    if (method_exists($obj, $action)) {
        if ($id !== null) {
            $obj->$action($id);
        } else {
            $obj->$action();
        }
    } else {
        echo "Action không tồn tại.";
    }
} else {
    echo "Controller không tồn tại.";
}
