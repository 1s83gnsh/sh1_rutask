<?php if (empty($_SESSION['user']) || !is_array($_SESSION['user'])): ?>
<div class="modal fade" id="authModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Вход / Регистрация</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/auth/login" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="Логин" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
                <hr>
                <form action="/auth/register" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="Логин" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){ $('#authModal').modal('show'); });
</script>
<?php else: ?>
    <h1><?php echo htmlspecialchars($data['header']); ?></h1>
    <p><?php echo htmlspecialchars($data['sub_header']); ?></p>
<?php endif; ?>