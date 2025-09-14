<h1>Настройка прав</h1>
<form method="post">
    <div class="form-group">
        <label>Права</label>
        <?php foreach ($data['permissions'] as $perm): ?>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="<?php echo $perm['id']; ?>"
                    <?php echo in_array($perm['id'], array_column($data['current_permissions'], 'id')) ? 'checked' : ''; ?>>
                <label class="form-check-label"><?php echo htmlspecialchars($perm['action'] . ' ' . $perm['resource']); ?></label>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>