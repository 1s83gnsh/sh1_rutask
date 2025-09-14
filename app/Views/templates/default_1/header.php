<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? 'Simple PHP MVC Framework'); ?></title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Simple PHP MVC</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto"></ul>
            <?php if (!empty($_SESSION['user']) && is_array($_SESSION['user'])): ?>
                <div class="nav-item">
                    <a class="nav-link" href="/profile"><?php echo htmlspecialchars($_SESSION['user']['first_name'] ?: $_SESSION['user']['login']); ?></a>
                    <a class="nav-link" href="/auth/logout">Выход</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">