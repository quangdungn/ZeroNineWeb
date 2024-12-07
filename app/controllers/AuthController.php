<?php
require_once __DIR__.'/../core/BaseController.php';
require_once __DIR__.'/../models/UserModel.php';

class AuthController extends BaseController {
    protected $userModel;

    public function __construct() {
        // Đã bỏ session_start() tại đây
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userModel->checkLogin($username, $password);
            if ($user) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                if ($user['role'] == 1) {
                    $this->redirect('index.php?controller=admin&action=index');
                } else {
                    $this->redirect('index.php');
                }
            } else {
                $error = "Sai tài khoản hoặc mật khẩu";
                $this->render('admin/login', ['error' => $error]);
            }
        } else {
            $this->render('admin/login');
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('index.php');
    }
}
