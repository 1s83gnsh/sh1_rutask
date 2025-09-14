<?php
class Helper {
    public static function output($message) {
        header('Content-Type: application/json');
        echo json_encode($message);
        exit;
    }
}