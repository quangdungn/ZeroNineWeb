<?php
class BaseController {
    protected function render($view, $data = []) {
        extract($data);
        include __DIR__.'/../views/layout/header.php';
        include __DIR__.'/../views/'.$view.'.php';
        include __DIR__.'/../views/layout/footer.php';
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
