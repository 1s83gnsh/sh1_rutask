<?php
// Шаблон default: объединяет header, view и footer
require TEMPLATE_PATH . 'default/header.php';
require TEMPLATE_PATH . 'default/' . $view . '/index.php';
require TEMPLATE_PATH . 'default/footer.php';