<?php
require_once TEMPLATE_PATH . 'default/header.php';
?>
    <?php require_once TEMPLATE_PATH . 'default/sidebar.php'; ?>  
        <!-- Контент -->
        <main class="layout">
            <section class="content">
                <div class="container-fluid">
                    <?php
                    $view_file = TEMPLATE_PATH . 'default/' . $view . '/index.php';
                    if (!file_exists($view_file)) {
                        header('HTTP/1.1 404 Not Found');
                        $title = '404';
                        $error = 'Представление не найдено';
                        require TEMPLATE_PATH . 'default/error/index.php';
                        exit;
                    }
                    require_once $view_file;
                    ?>
                </div>
            </section>
        </main>
        <!-- Футер -->
        <?php require_once TEMPLATE_PATH . 'default/footer.php'; ?>
    </div>
    <!-- Скрипты -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script>
        (function () {
            var page = document.getElementById('page');
            var sidebar = document.getElementById('sidebar');
            var backdrop = document.getElementById('backdrop');
            var toggleBtn = document.getElementById('sidebarToggle');
            // Авторизация
            var isAuthenticated = <?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>;
            var profileName = '<?php echo isset($_SESSION['user']) && !empty($_SESSION['user']['first_name']) ? htmlspecialchars($_SESSION['user']['first_name']) : 'Гость'; ?>';
            document.getElementById('ddName').textContent = profileName;
            document.querySelector('.auth-user').style.display = isAuthenticated ? 'block' : 'none';
            document.querySelector('.auth-guest').style.display = isAuthenticated ? 'none' : 'block';
            document.getElementById('year').textContent = new Date().getFullYear();
            // Тоггл сайдбара
            toggleBtn.addEventListener('click', function () {
                if (window.innerWidth < 992) {
                    sidebar.classList.toggle('show');
                    backdrop.classList.toggle('show');
                    document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
                } else {
                    page.classList.toggle('sidebar-collapsed');
                }
            });
            backdrop.addEventListener('click', function () {
                sidebar.classList.remove('show');
                backdrop.classList.remove('show');
                document.body.style.overflow = '';
            });
        })();
    </script>
</body>
</html>