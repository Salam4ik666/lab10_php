<?php
include_once('../config/config.php');
include_once('../scripts/db.php');
include_once('../includes/header.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <style>
        /* Ваши стили здесь */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>Спортивные мероприятия</h1>
        <nav>
            <a href="/pages/index.php">Главная</a>
            <a href="/pages/events.php">Текущие мероприятия</a>
            <a href="/pages/registration.php">Регистрация</a>
            <a href="/pages/login.php">Авторизация</a>
        </nav>
    </header>
    <div class="container">
        <h2>Добро пожаловать!</h2>
        <p>Выберите действие:</p>
        <button onclick="location.href='/pages/events.php'">Посмотреть текущие мероприятия</button><br><br>
        <button onclick="location.href='/pages/registration.php'">Зарегистрироваться</button><br><br>
        <button onclick="location.href='/pages/login.php'">Войти</button>
        <button onclick="location.href='/pages/edit_event.php'">Изменить мероприятие</button>
    </div>
    <div class="footer">
        &copy; 2024 Event Platform
    </div>
</body>

</html>

<?php
include_once('../includes/footer.php');
?>