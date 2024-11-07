<?php
class Store {
    private $id;
    private $name;
    private $location;
    private $category;

    public function __construct($id, $name, $location, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->category = $category;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getCategory() {
        return $this->category;
    }

    public static function all($db) {
        $stmt = $db->prepare("SELECT * FROM stores");
        $stmt->execute();
        $stores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($store) => new self($store['id'], $store['name'], $store['location'], $store['category']), $stores);
    }

    public static function find($pdo, $id) {
        // Requête SQL pour obtenir les données du magasin
        $stmt = $pdo->prepare("SELECT id, name, location, category FROM stores WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Récupération des résultats sous forme de tableau associatif
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            // Retourne un objet Store en utilisant les quatre paramètres
            return new self($data['id'], $data['name'], $data['location'], $data['category']);
        }
        
        return null; // Si aucun magasin n'est trouvé
    }

    public static function create($db, $name, $location, $category) {
        $stmt = $db->prepare("INSERT INTO stores (name, location, category) VALUES (:name, :location, :category)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $db->lastInsertId();
    }

    public static function update($db, $id, $name, $location, $category) {
        $stmt = $db->prepare("UPDATE stores SET name = :name, location = :location, category = :category WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':category', $category);
        return $stmt->execute();
    }

    public static function delete($db, $id) {
        $stmt = $db->prepare("DELETE FROM stores WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'category' => $this->category
        ];
    }
}
