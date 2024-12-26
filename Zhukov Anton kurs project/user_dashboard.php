<?php
require 'functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель пользователя</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/user_dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать, пользователь!</h1>
        <form action="process_message.php" method="POST">
            <textarea name="content" placeholder="Введите сообщение" required></textarea><br>
            <button type="submit">Отправить</button>
        </form>
        <a href="logout.php" class="logout-btn">Выйти</a>
    </div>
</body>
</html>