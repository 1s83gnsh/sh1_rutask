<h1>Редактировать пользователя</h1>
<form method="post">
    <div class="form-group">
        <label>Логин</label>
        <input type="text" class="form-control" name="login" value="<?php echo htmlspecialchars($data['user']['login']); ?>" disabled>
    </div>
    <div class="form-group">
        <label>Имя</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($data['user']['first_name']); ?>">
    </div>
    <div class="form-group">
        <label>Фамилия</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($data['user']['last_name']); ?>">
    </div>
    <div class="form-group">
        <label>Телефон</label>
        <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($data['user']['phone']); ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($data['user']['email']); ?>">
    </div>
    <div class="form-group">
        <label>Роль</label>
        <select class="form-control" name="role_id">
            <?php foreach ($data['roles'] as $role): ?>
                <option value="<?php echo $role['id']; ?>" <?php echo $role['id'] == $data['user']['role_id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($role['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>