<?php
include_once('../scripts/db.php');

session_start();

// Проверка наличия активной сессии и роли пользователя
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] !== 1) {
    // Если пользователь не авторизован или у него нет прав доступа
    header("Location: login.php"); // Перенаправление на страницу авторизации
    exit();
}

// Обработчик формы добавления мероприятия
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из формы
    $name = $_POST['name'];
    $price = $_POST['price'];
    $number_seats = $_POST['number_seats'];
    $date = $_POST['date'];

    // SQL запрос для добавления нового мероприятия
    $sql = "INSERT INTO events (name, price, number_seats, date) VALUES (:name, :price, :number_seats, :date)";

    // Подготовка и выполнение запроса с использованием подготовленных выражений
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':number_seats' => $number_seats,
        ':date' => $date
    ]);

    // Перенаправление на страницу со списком мероприятий после добавления
    header("Location: events.php");
    exit();
}
?>

<!DOCTYPE html>
<html