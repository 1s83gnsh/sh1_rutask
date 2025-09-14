<?php
// Страница ошибки
$title = $title ?? '404';
$error = $error ?? 'Страница не найдена';
?>
<div>
    <h1><?php echo $title; ?></h1>
    <p><?php echo $error; ?></p>
</div>