<div class="row" id="profile-section">
    <div class="col-12">
        <div class="container">
            <h1>Профиль</h1>
            <?php
            // Отладка: вывести полученные данные
            error_log("Отладка: Данные в шаблоне: " . print_r($data, true));
            if (empty($data['first_name']) && empty($data['last_name']) && empty($data['phone']) && empty($data['email'])): ?>
                <p style="color: red;">Профиль не заполнен. Пожалуйста, заполните данные.</p>
            <?php else: ?>
                <p>Текущие данные: Имя: <?php echo htmlspecialchars($data['first_name'] ?? ''); ?>, Фамилия: <?php echo htmlspecialchars($data['last_name'] ?? ''); ?></p>
            <?php endif; ?>
            <?php if (!empty($data['success_message'])): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($data['success_message']); ?>
                </div>
            <?php endif; ?>
            <p><strong>Логин:</strong> <?php echo htmlspecialchars($data['login'] ?? 'Не указан'); ?></p>
            <form method="post">
                <div class="form-group">
                    <label for="first_name">Имя</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($data['first_name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Фамилия</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($data['last_name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($data['phone'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>