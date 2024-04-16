<?php
include_once('../config/config.php');
include_once('../scripts/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Авторизация прошла успешно, выполните необходимые действия
            echo "Авторизация успешна!";
        } else {
            echo "Неверный email или пароль";
        }
    } catch (PDOException $e) {
        echo "Ошибка при аутентификации: " . $e->getMessage();
    }
}
