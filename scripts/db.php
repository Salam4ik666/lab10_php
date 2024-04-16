<?php
// Параметры подключения к базе данных
$host = 'localhost';      // Хост базы данных
$dbname = 'event_platform'; // Имя базы данных
$username = 'root';        // Имя пользователя базы данных
$password = 'artur';    // Пароль пользователя базы данных

// Создание объекта PDO для подключения к базе данных
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Установка режима обработки ошибок для PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Установка кодировки для работы с базой данных
    $pdo->exec("set names utf8mb4");
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
