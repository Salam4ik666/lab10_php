<?php
include_once('../scripts/db.php');
session_start();

// Запрос на выборку зарегистрированных пользователей для конкретного мероприятия
$event_id = $_GET['event_id'];
$query = "SELECT users.name, users.surname, users.email
          FROM users
          JOIN event_records ON users.id = event_records.user_id
          WHERE event_records.event_id = :event_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['event_id' => $event_id]);
$registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML-код для отображения зарегистрированных пользователей -->
<h2>Зарегистрированные на мероприятие пользователи:</h2>
<table>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($registrations as $user) : ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['surname'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>