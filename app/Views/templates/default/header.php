 <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap 4.6.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title><?php echo htmlspecialchars($title ?? 'Simple PHP MVC Dashboard'); ?></title>
    <style>
        :root { --sidebar-width: 260px; }
        .page { min-height: 100vh; display: flex; flex-direction: column; padding-top: 56px; background: #f8f9fa; }
        .layout { flex: 1 1 auto; display: flex; }
        .sidebar { width: var(--sidebar-width); flex: 0 0 var(--sidebar-width); background: #212529; color: #fff; position: fixed; top: 56px; bottom: 0; left: 0; transform: translateX(0); transition: transform .2s ease; z-index: 1030; overflow-y: auto; }
        .sidebar .nav-link { color: #adb5bd; padding: .65rem 1rem; border-left: 3px solid transparent; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background: rgba(255,255,255,.05); border-left-color: #17a2b8; }
        .sidebar-collapsed .sidebar { transform: translateX(-100%); }
        .sidebar-collapsed .content { margin-left: 0; }
        .content { flex: 1 1 auto; margin-left: var(--sidebar-width); padding: 1rem; transition: margin-left .2s ease; }
        footer.footer { background: #fff; border-top: 1px solid #e9ecef; padding: .75rem 1rem; color: #6c757d; font-size: .875rem; }
        @media (max-width: 991.98px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .content { margin-left: 0; }
            .backdrop { position: fixed; inset: 0; background: rgba(0,0,0,.35); z-index: 1025; opacity: 0; pointer-events: none; transition: opacity .2s ease; }
            .backdrop.show { opacity: 1; pointer-events: auto; }
        }
        .card { margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        table th, table td { border: 1px solid #dee2e6; padding: .5rem; text-align: left; }
        table th { background-color: #212529; color: #fff; }
    </style>
</head>
<body>
    <!-- Навбар -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button id="sidebarToggle" class="btn btn-outline-light mr-2" type="button"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand font-weight-bold" href="#"><i class="fas fa-columns mr-1"></i> Simple PHP MVC</a>
        <!-- Кнопка "..." -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-2" href="#" id="menuDots" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuDots">
                    <!-- Для авторизованного -->
                    <div class="auth-user" style="display: none;">
                        <h6 class="dropdown-header"><i class="fas fa-user mr-1"></i><span id="ddName">Гость</span></h6>
                        <a class="dropdown-item" href="/profile"><i class="fas fa-id-card mr-2"></i>Профиль</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/auth/logout"><i class="fas fa-sign-out-alt mr-2"></i>Выход</a>
                    </div>
                    <!-- Для гостя -->
                    <div class="auth-guest">
                        <a class="dropdown-item" href="/auth/login"><i class="fas fa-sign-in-alt mr-2"></i>Вход</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="page" id="page">