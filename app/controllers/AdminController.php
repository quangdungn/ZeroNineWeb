<?php
require_once __DIR__.'/../core/BaseController.php';
require_once __DIR__.'/../models/NewsModel.php';
require_once __DIR__.'/../models/CategoryModel.php';

class AdminController extends BaseController {
    protected $newsModel;
    protected $categoryModel;

    public function __construct() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
        $this->newsModel = new NewsModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $allNews = $this->newsModel->getAllNews();
        $this->render('admin/news_list', ['allNews' => $allNews]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            $image = $this->uploadImage('image');

            $this->newsModel->addNews($title, $content, $image, $category_id);
            $this->redirect('index.php?controller=admin&action=index');
        } else {
            $categories = $this->categoryModel->getAll();
            $this->render('admin/news_add', ['categories' => $categories]);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            $item = $this->newsModel->getNewsById($id);
            $currentImage = $item['image'];

            $newImage = $this->uploadImage('image', $currentImage);

            $this->newsModel->updateNews($id, $title, $content, $newImage, $category_id);
            $this->redirect('index.php?controller=admin&action=index');
        } else {
            $item = $this->newsModel->getNewsById($id);
            $categories = $this->categoryModel->getAll();
            $this->render('admin/news_edit', ['item' => $item, 'categories' => $categories]);
        }
    }

    public function delete($id) {
        $this->newsModel->deleteNews($id);
        $this->redirect('index.php?controller=admin&action=index');
    }

    public function dashboard() {
        $this->render('admin/dashboard');
    }

    private function uploadImage($fieldName, $oldImage = '') {
        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/images/';
            $fileName = basename($_FILES[$fieldName]['name']);
            
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','gif'];
            if(!in_array($ext, $allowed)) {
                return $oldImage;
            }
            
            $newFileName = uniqid() . '.' . $ext;
            $targetPath = $uploadDir . $newFileName;
            
            if(move_uploaded_file($_FILES[$fieldName]['tmp_name'], $targetPath)) {
                return $newFileName;
            } else {
                return $oldImage;
            }
        } else {
            return $oldImage;
        }
    }
}
