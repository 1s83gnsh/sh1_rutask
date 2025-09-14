<h1>Пользователи</h1>
<a href="/admin/create" class="btn btn-primary">Добавить</a>
<table class="table">
    <tr><th>ID</th><th>Логин</th><th>Имя</th><th>Фамилия</th><th>Роль</th><th>Действия</th></tr>
    <?php foreach ($data['users'] as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo htmlspecialchars($user['login']); ?></td>
        <td><?php echo htmlspecialchars($user['first_name']); ?></td>
        <td><?php echo htmlspecialchars($user['last_name']); ?></td>
        <td><?php echo htmlspecialchars((new Role)->getNameById($user['role_id'])); ?></td>
        <td>
            <a href="/admin/edit/<?php echo $user['id']; ?>" class="btn btn-sm btn-warning">Редактировать</a>
            <a href="/admin/delete/<?php echo $user['id']; ?>" class="btn btn-sm btn-danger">Удалить</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>