
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    console.log('Проверка: скрипт выполняется');
    if (typeof jQuery === 'undefined') {
        console.error('jQuery не загружен');
    } else {
        console.log('jQuery загружен, версия:', jQuery.fn.jquery);
        jQuery(document).ready(function($) {
            console.log('jQuery ready');
            try {
                jQuery('#authModal').modal('show');
                console.log('Модальное окно инициировано');
            } catch (e) {
                console.error('Ошибка при открытии модального окна:', e.message);
            }
        });
    }
    </script>

</body>
</html>