<?php
require_once __DIR__ . '/../Libraries/Controller.php';

class Home extends Controller {
    public function index(...$params) {
        $data = [
            'header' => 'Simple PHP MVC Framework',
            'sub_header' => $params ? implode(', ', $params) : 'Just what you need!'
        ];
        $this->view('home', $data);
    }
}