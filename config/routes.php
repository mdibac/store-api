<?php

$router = new \AltoRouter();

// Liste des magasins
$router->map('GET', '/api/stores', 'StoreController@getAllStores');

// Détails d'un magasin
$router->map('GET', '/api/store/[i:id]', 'StoreController@getStore');

// Ajouter un magasin
$router->map('POST', '/api/store', 'StoreController@addStore');

// Modifier un magasin
$router->map('PUT', '/api/store/[i:id]', 'StoreController@updateStore');

// Supprimer un magasin
$router->map('DELETE', '/api/store/[i:id]', 'StoreController@deleteStore');

return $router;
