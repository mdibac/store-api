<?php

namespace App\Service;
use App\Model\Store;

class StoreService
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllStores()
    {
        $stmt = $this->pdo->query("SELECT * FROM stores");
        $storesData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $stores = [];
        foreach ($storesData as $data) {
            // Crée un objet Store pour chaque entrée dans la base de données
            $stores[] = new Store(
                $data['id'],
                $data['name'],
                $data['location'],
                $data['category']
            );
        }

        return $stores;
    }


    public function getStoreById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM stores WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        if ($data) {
            return new Store(
                $data['id'],
                $data['name'],
                $data['location'],
                $data['category']
            );
        }
    
        return null; // Si aucun magasin n'est trouvé
    }    

    public function addStore($data)
    {
        // Utilisez les bonnes colonnes : name, location, category
        $stmt = $this->pdo->prepare("INSERT INTO stores (name, location, category) VALUES (:name, :location, :category)");

        // Liez correctement les valeurs
        $stmt->execute([
            ':name' => $data['name'],
            ':location' => $data['location'],
            ':category' => $data['category']
        ]);
    }

    public function updateStore($id, $data)
    {
         // Vérifier si le magasin avec l'ID existe
        $stmt = $this->pdo->prepare("SELECT id FROM stores WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $store = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Si le magasin n'existe pas, renvoyer une erreur
        if (!$store) {
            throw new \Exception('Store not found');
        }

        $stmt = $this->pdo->prepare("UPDATE stores SET name = :name, location = :location, category = :category WHERE id = :id");

        $data['id'] = $id;

        $stmt->execute([
            ':name' => $data['name'],
            ':location' => $data['location'],
            ':category' => $data['category'],
            ':id' => $id
        ]);
    }


    public function deleteStore($id)
    {
         // Vérifier si le magasin avec l'ID existe
        $stmt = $this->pdo->prepare("SELECT id FROM stores WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $store = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Si le magasin n'existe pas, renvoyer une erreur
        if (!$store) {
            throw new \Exception('Store not found');
        }
        $stmt = $this->pdo->prepare("DELETE FROM stores WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
