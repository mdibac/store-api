<?php

$router = new \AltoRouter();

// Liste des magasins
// $router->map('GET', '/stores', 'App\Controller\StoreController@getAllStores');
$router->map('GET', '/stores', 'StoreController@listStores', 'store_list');

// Détails d'un magasin
//$router->map('GET', '/store/[i:id]', 'App\Controller\StoreController@getStore');
$router->map('GET', '/store/[i:id]', 'StoreController@showStore', 'store_detail');

// Ajouter un magasin
$router->map('POST', '/store', 'StoreController@addStore');

// Modifier un magasin
$router->map('PUT', '/store/[i:id]', 'StoreController@updateStore');

// Supprimer un magasin
$router->map('DELETE', '/store/[i:id]', 'StoreController@deleteStore');

return $router;
