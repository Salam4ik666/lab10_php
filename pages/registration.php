<?php
session_start();

// Подключение к базе данных
include_once('../scripts/db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['event_id'])) {
    $eventId = $_POST['event_id'];

    // Проверяем, авторизован ли пользователь
    if (!isset($_SESSION['user_id'])) {
        header("Location: /login.php");
        exit();
    }

    // Получаем имя пользователя из сессии
    $userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';

    // Возвращаем пользователя на страницу события
    header("Location: /pages/events.php");

    // Записываем информацию о регистрации в базу данных
    $userId = $_SESSION['user_id'];
    $sql = "INSERT INTO registrations (event_id, user_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$eventId, $userId]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация на мероприятие</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include_once('../includes/header.php'); ?>
    <div class="container">
        <h2>Регистрация на мероприятие</h2>
        <form action="registration.php" method="post">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" value="<?php echo $userName; ?>" readonly><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <input type="hidden" name="event_id" value="<?php echo $_POST['event_id']; ?>">
            <button type="submit">Записаться на мероприятие</button>
        </form>
    </div>
    <?php include_once('../includes/footer.php'); ?>
</body>

</html>