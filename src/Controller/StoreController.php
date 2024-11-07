<?php
class StoreController {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllStores() {
        $stores = Store::all($this->db);
        if (!$stores) {
            http_response_code(404);
            echo json_encode(["message" => "No stores found"]);
            return;
        }
        include '../public/store_list.php';
    }

    public function getStoreById($id) {
        $store = Store::find($this->db, $id);
        if (!$store) {
            // Si le magasin n'existe pas, afficher un message d'erreur
            http_response_code(404);
            echo json_encode(["message" => "No stores found"]);
            return;
            
        }
        // Inclure le fichier store_detail.php et passer l'objet $store
        include '../public/store_detail.php';
    }



    public function createStore($data) {
        $id = Store::create($this->db, $data['name'], $data['location'], $data['category']);
        echo json_encode(["id" => $id]);
    }

    public function updateStore($id, $data) {
        if (Store::update($this->db, $id, $data['name'], $data['location'], $data['category'])) {
            echo json_encode(["message" => "Store updated"]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Store not found"]);
        }
    }

    public function deleteStore($id) {
        if (Store::delete($this->db, $id)) {
            echo json_encode(["message" => "Store deleted"]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Store not found"]);
        }
    }
}
