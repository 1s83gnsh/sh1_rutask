<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-info-circle"></i> Добро пожаловать</h5>
        <p class="card-text">Добро пожаловать в панель управления Simple PHP MVC. Здесь вы можете управлять пользователями и настройками.</p>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-sign-in-alt"></i> Вход</h5>
        <form action="/auth/login" method="post">
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль" required>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user-plus"></i> Регистрация</h5>
        <form action="/auth/register" method="post">
            <div class="form-group">
                <label for="reg-login">Логин</label>
                <input type="text" class="form-control" id="reg-login" name="login" placeholder="Введите логин" required>
            </div>
            <div class="form-group">
                <label for="reg-password">Пароль</label>
                <input type="password" class="form-control" id="reg-password" name="password" placeholder="Введите пароль" required>
            </div>
            <button type="submit" class="btn btn-success">Зарегистрироваться</button>
        </form>
    </div>
</div>