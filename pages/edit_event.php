<?php
include_once('../scripts/db.php');

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $number_seats = $_POST['number_seats'];
    $date = $_POST['date'];

    // SQL запрос для добавления нового мероприятия
    $sql = "INSERT INTO events (name, price, number_seats, date) VALUES (:name, :price, :number_seats, :date)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':number_seats' => $number_seats,
        ':date' => $date
    ]);

    // Перенаправление на страницу с текущими мероприятиями после добавления
    header("Location: /pages/events.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Добавить мероприятие</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
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

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"],
        input[type="datetime-local"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 12px;
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Добавить новое мероприятие</h2>
        <form action="add_event.php" method="post">
            <label for="name">Название мероприятия:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="price">Цена:</label>
            <input type="text" id="price" name="price" required><br><br>
            <label for="number_seats">Количество мест:</label>
            <input type="number" id="number_seats" name="number_seats" required><br><br>
            <label for="date">Дата и время:</label>
            <input type="datetime-local" id="date" name="date" required><br><br>
            <button type="submit">Добавить мероприятие</button>
        </form>
    </div>
</body>

</html>