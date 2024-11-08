<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Controller\StoreController; 

$dbConfig = include __DIR__ . '/../config/database.php';
$pdo = new PDO(
    "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",
    $dbConfig['user'],
    $dbConfig['password']
);

$router = include __DIR__ . '/../config/routes.php';
$match = $router->match();

if ($match) {
    list($controllerName, $action) = explode('@', $match['target']);
    $className = "App\\Controller\\$controllerName";
    $controller = new $className($pdo);
    call_user_func_array([$controller, $action], $match['params']);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Route not found']);
}
