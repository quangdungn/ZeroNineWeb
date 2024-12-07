<?php
require_once __DIR__.'/../core/BaseModel.php';

class NewsModel extends BaseModel {
    public function getAllNews() {
        $stmt = $this->conn->query("SELECT n.*, c.name as category_name FROM news n JOIN categories c ON n.category_id = c.id ORDER BY n.created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id) {
        $stmt = $this->conn->prepare("SELECT n.*, c.name as category_name FROM news n JOIN categories c ON n.category_id = c.id WHERE n.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchNews($keyword) {
        $stmt = $this->conn->prepare("SELECT n.*, c.name as category_name FROM news n JOIN categories c ON n.category_id = c.id WHERE n.title LIKE ? OR n.content LIKE ?");
        $like = "%$keyword%";
        $stmt->execute([$like, $like]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNews($title, $content, $image, $category_id) {
        $stmt = $this->conn->prepare("INSERT INTO news (title, content, image, created_at, category_id) VALUES (?, ?, ?, NOW(), ?)");
        return $stmt->execute([$title, $content, $image, $category_id]);
    }

    public function updateNews($id, $title, $content, $image, $category_id) {
        $stmt = $this->conn->prepare("UPDATE news SET title = ?, content = ?, image = ?, category_id = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $image, $category_id, $id]);
    }

    public function deleteNews($id) {
        $stmt = $this->conn->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
