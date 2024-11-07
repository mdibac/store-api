<?php
require_once '../src/Database.php';
require_once '../src/Model/Store.php';
require_once '../src/Controller/StoreController.php';

$config = require '../config/database.php';
$db = (new Database($config))->getConnection();

$controller = new StoreController($db);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('?', $_SERVER['REQUEST_URI'])[0];
$uri = explode('/', trim($requestUri, '/'));
$id = isset($uri[1]) ? (int) $uri[1] : null;

// Initialiser la variable $stores à null
$stores = null;

switch ($requestMethod) {
    case 'GET':
        if (count($uri) == 1) {
            // Récupérer tous les magasins
            $stores = $controller->getAllStores(); // Alimente $stores avec les magasins
        } elseif (count($uri) == 2) {
            // Récupérer un magasin spécifique par ID
            $store = $controller->getStoreById($id);
            exit;
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->createStore($data);
        break;
    case 'PUT':
        if ($id) {
            $data = json_decode(file_get_contents('php://input'), true);
            $controller->updateStore($id, $data);
        }
        break;
    case 'DELETE':
        if ($id) {
            $controller->deleteStore($id);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
}

?>
