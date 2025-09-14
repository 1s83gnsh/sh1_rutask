<h1>Добавить пользователя</h1>
<form method="post">
    <div class="form-group">
        <label>Логин</label>
        <input type="text" class="form-control" name="login" required>
    </div>
    <div class="form-group">
        <label>Пароль</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label>Роль</label>
        <select class="form-control" name="role_id">
            <?php foreach ($data['roles'] as $role): ?>
                <option value="<?php echo $role['id']; ?>"><?php echo htmlspecialchars($role['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>