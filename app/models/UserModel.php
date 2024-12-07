<?php
require_once __DIR__.'/../core/BaseModel.php';

class UserModel extends BaseModel {
    public function checkLogin($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]); 
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
