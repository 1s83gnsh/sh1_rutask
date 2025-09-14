<div class="container mt-5">
    <?php if (empty($_SESSION['user']) || !is_array($_SESSION['user'])): ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Добро пожаловать</h4>
                    </div>
                    <div class="card-body">
                        <!-- Вкладки -->
                        <ul class="nav nav-tabs" id="authTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab">Вход</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab">Регистрация</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="authTabsContent">
                            <!-- Вход -->
                            <div class="tab-pane fade show active" id="login" role="tabpanel">
                                <form action="/auth/login" method="post">
                                    <div class="form-group">
                                        <label for="login">Логин</label>
                                        <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Пароль</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Войти</button>
                                </form>
                            </div>
                            <!-- Регистрация -->
                            <div class="tab-pane fade" id="register" role="tabpanel">
                                <form action="/auth/register" method="post">
                                    <div class="form-group">
                                        <label for="reg-login">Логин</label>
                                        <input type="text" class="form-control" id="reg-login" name="login" placeholder="Придумайте логин" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg-password">Пароль</label>
                                        <input type="password" class="form-control" id="reg-password" name="password" placeholder="Придумайте пароль" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Зарегистрироваться</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="alert alert-success shadow-sm">
                    <h4 class="alert-heading">
                        <?= htmlspecialchars($data['header'] ?? 'Simple PHP MVC Framework') ?>
                    </h4>
                    <p><?= htmlspecialchars($data['sub_header'] ?? 'Just what you need!') ?></p>
                    <hr>
                    <p>Добро пожаловать, <strong><?= htmlspecialchars($_SESSION['user']['login'] ?? 'Гость') ?></strong>!</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>