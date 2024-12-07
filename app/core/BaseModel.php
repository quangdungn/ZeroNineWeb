<?php
class BaseModel {
    protected $conn;

    public function __construct() {
        $config = include __DIR__.'/../config/config.php';
        $this->conn = new PDO(
            'mysql:host='.$config['db_host'].';dbname='.$config['db_name'].';charset=utf8',
            $config['db_user'],
            $config['db_pass']
        );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
