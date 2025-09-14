<?php
namespace App;

class Router {
    public static function route($url) {
        $url = trim($url, '/');
        if (empty($url)) {
            $controller = new \App\Controller\Home();
        } else {
            die('Route not found');
        }
    }
}