<?php
class Controller {
    public function view($fileName, $data = null) {
        if ($data) {
            extract($data);
        }
        $file = VIEW_PATH . "/$fileName.php";
        if (file_exists($file)) {
            require $file;
        } else {
            die("View $fileName not found");
        }
    }
}