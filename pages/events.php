<?php
session_start();

// Подключение к базе данных
include_once('../scripts/db.php');

// Запрос для получения всех мероприятий
$sqlEvents = "SELECT id, name, price, number_seats, date FROM events";
$stmtEvents = $pdo->query($sqlEvents);
$events = $stmtEvents->fetchAll(PDO::FETCH_ASSOC);

// Проверяем, была ли отправлена форма записи
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['event_id'])) {
    $eventId = $_POST['event_id'];
    // Показываем форму для ввода имени
    echo "<h2>Запись на мероприятие:</h2>";
    echo "<form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\">";
    echo "<input type=\"hidden\" name=\"event_id\" value=\"$eventId\">";
    echo "<label for=\"user_name\">Введите ваше имя:</label>";
    echo "<input type=\"text\" id=\"user_name\" name=\"user_name\" required>";
    echo "<button type=\"submit\">Подтвердить</button>";
    echo "</form>";

    exit(); // Останавливаем дальнейшее выполнение скрипта
}

// Если форма с именем была отправлена, показываем имя под выбранным мероприятием
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user_name'])) {
    $userName = htmlspecialchars($_POST['user_name']); // Получаем введенное имя
    $eventId = $_POST['event_id'];

    // Выводим сообщение с именем под выбранным мероприятием
    echo "<h2>Вы записаны на мероприятие:</h2>";
    echo "<p>Имя: $userName</p>";

    // Показываем ссылку для возврата к мероприятиям
    echo "<p><a href=\"events.php\">Вернуться к мероприятиям</a></p>";

    exit(); // Останавливаем дальнейшее выполнение скрипта
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Текущие мероприятия</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<style>
    /* Стили для страницы текущих мероприятий */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    p {
        color: #666;
        margin-bottom: 10px;
    }

    strong {
        color: #000;
    }

    form {
        margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="datetime-local"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #555;
    }
</style>

<body>
    <?php include_once('../includes/header.php'); ?>
    <div class="container">
        <h2>Текущие мероприятия</h2>
        <?php
        // Вывод всех мероприятий на странице
        foreach ($events as $event) {
            echo "<p>{$event['name']} - Цена: {$event['price']} рублей - Количество мест: {$event['number_seats']} - Дата и время: {$event['date']}</p>";
            echo "<p><strong>Зарегистрированные участники:</strong></p>";
            if (isset($registrationMap[$event['name']])) {
                foreach ($registrationMap[$event['name']] as $user) {
                    echo "<p>$user</p>";
                }
            } else {
                echo "<p>Нет зарегистрированных участников</p>";
            }
            // Форма для записи на мероприятие
            echo "<form action=\"{$_SERVER['PHP_SELF']}\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"event_id\" value=\"{$event['id']}\">";
            echo "<button type=\"submit\">Записаться</button>";
            echo "</form>";
        }
        ?>
    </div>
    <?php include_once('../includes/footer.php'); ?>
</body>

</html>