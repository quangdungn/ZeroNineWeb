<?php
require_once __DIR__.'/../core/BaseController.php';
require_once __DIR__.'/../models/NewsModel.php';

class HomeController extends BaseController {
    protected $newsModel;

    public function __construct() {
        $this->newsModel = new NewsModel();
    }

    public function index() {
        $news = $this->newsModel->getAllNews();
        $this->render('home/index', ['news' => $news]);
    }
}
