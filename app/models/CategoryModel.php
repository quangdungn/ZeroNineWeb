<?php
require_once __DIR__.'/../core/BaseModel.php';

class CategoryModel extends BaseModel {
    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
