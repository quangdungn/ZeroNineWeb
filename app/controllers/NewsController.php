<?php
require_once __DIR__.'/../core/BaseController.php';
require_once __DIR__.'/../models/NewsModel.php';

class NewsController extends BaseController {
    protected $newsModel;

    public function __construct() {
        $this->newsModel = new NewsModel();
    }

    public function detail($id) {
        $item = $this->newsModel->getNewsById($id);
        if (!$item) {
            echo "Không tìm thấy tin tức.";
            return;
        }
        $this->render('home/detail', ['item' => $item]);
    }

    public function search() {
        $keyword = isset($_GET['q']) ? $_GET['q'] : '';
        $results = $this->newsModel->searchNews($keyword);
        $this->render('home/search', ['results' => $results, 'keyword' => $keyword]);
    }
}
