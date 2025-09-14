<?php
require_once TEMPLATE_PATH . 'default/header.php';
$view_file = TEMPLATE_PATH . 'default/' . $view . '/index.php';
/*echo TEMPLATE_PATH . 'default/header.php'."---";
echo $view_file."---";*/
if (!file_exists($view_file)) {
    header('HTTP/1.1 404 Not Found');
    $title = '404';
    $error = 'Представление не найдено';
    require TEMPLATE_PATH . 'default/error/index.php';
    exit;
}
require_once $view_file;
require_once TEMPLATE_PATH . 'default/footer.php';
?>