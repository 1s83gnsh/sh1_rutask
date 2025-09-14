 CREATE DATABASE sh1;
USE sh1;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

INSERT INTO roles (name) VALUES ('guest'), ('user'), ('administrator'), ('admin');

CREATE TABLE permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    action ENUM('view', 'edit', 'delete', 'create') NOT NULL,
    resource VARCHAR(50) NOT NULL,
    UNIQUE KEY (action, resource)
);

-- Пример прав для таблицы users
INSERT INTO permissions (action, resource) VALUES
('view', 'users'), ('edit', 'users'), ('delete', 'users'), ('create', 'users');

CREATE TABLE role_permissions (
    role_id INT,
    permission_id INT,
    PRIMARY KEY (role_id, permission_id),
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);

-- Присвоение всех прав admin для users
SET @admin_id = (SELECT id FROM roles WHERE name = 'admin');
INSERT INTO role_permissions (role_id, permission_id)
SELECT @admin_id, id FROM permissions WHERE resource = 'users';

-- Аналогично для administrator, если нужно все права
SET @administrator_id = (SELECT id FROM roles WHERE name = 'administrator');
INSERT INTO role_permissions (role_id, permission_id)
SELECT @administrator_id, id FROM permissions WHERE resource = 'users';

-- Для user: только view и edit
SET @user_id = (SELECT id FROM roles WHERE name = 'user');
INSERT INTO role_permissions (role_id, permission_id)
SELECT @user_id, id FROM permissions WHERE action IN ('view', 'edit') AND resource = 'users';

-- Для guest: только view
SET @guest_id = (SELECT id FROM roles WHERE name = 'guest');
INSERT INTO role_permissions (role_id, permission_id)
SELECT @guest_id, id FROM permissions WHERE action = 'view' AND resource = 'users';

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL DEFAULT '',
    last_name VARCHAR(100) NOT NULL DEFAULT '',
    login VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE RESTRICT
);

-- Первый администратор (пароль хэшировать в коде: password_hash('password', PASSWORD_DEFAULT))
INSERT INTO users (first_name, last_name, login, password, role_id)
VALUES ('Admin', 'Admin', 'admin', '$2y$10$K.ExampleHashHereForPlaceholder',
(SELECT id FROM roles WHERE name = 'admin'));