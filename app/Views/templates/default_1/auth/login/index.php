<h1>Вход</h1>
<form action="/auth/login" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="login" placeholder="Логин" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>