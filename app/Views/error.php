<?php
if (!isset($title) || !isset($error)) {
    die('Error: Missing required variables');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>/css/vanstyle.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>/css/icono.min.css">
    <title>Error</title>
</head>
<body>
    <div class="main-wide">
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <p><?php echo htmlspecialchars($error); ?></p>
    </div>
</body>
</html>