<?php
// Параметры подключения к базе данных
$host = 'localhost';      // Хост базы данных
$dbname = 'event_platform'; // Имя базы данных
$username = 'root'; // Имя пользователя базы данных
$password = 'artur'; // Пароль пользователя базы данных

// Строка подключения PDO
$dsn = "mysql:host=$host;dbname=$dbname";

// Создание объекта PDO
try {
    $pdo = new PDO($dsn, $username, $password);
    // Установка режима обработки ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
