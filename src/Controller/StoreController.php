<?php

namespace App\Controller;

use App\Service\StoreService;

class StoreController
{
    protected $storeService;

    public function __construct($pdo)
    {
        $this->storeService = new StoreService($pdo);
    }

    // public function getAllStores()
    // {
    //     echo json_encode($this->storeService->getAll());
    // }

    // public function getStore($id)
    // {
    //     echo json_encode($this->storeService->getById($id));
    // }

    public function listStores()
    {
        $stores = $this->storeService->getAllStores();
        include __DIR__ . '/../../public/store_list.php';
    }

    public function showStore($id)
    {
        $store = $this->storeService->getStoreById($id);
        include __DIR__ . '/../../public/store_detail.php';
    }

    public function addStore()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->storeService->addStore($data);
        echo json_encode(['status' => 'Store added']);
    }
    

    public function updateStore($id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $this->storeService->updateStore($id, $data);
            echo json_encode(['status' => 'Store updated']);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function deleteStore($id)
    {
        try {
            $this->storeService->deleteStore($id);
            echo json_encode(['status' => 'Store deleted']);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
