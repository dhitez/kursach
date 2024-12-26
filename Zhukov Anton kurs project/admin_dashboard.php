<?php
require 'config.php';
require 'functions.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM messages WHERE status = 'pending'";
$stmt = $pdo->query($sql);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$messages) {
    $messages = []; // Если сообщений нет, создаём пустой массив
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Модерация сообщений</h1>
        <?php if (empty($messages)): ?>
            <p class="no-messages">Нет сообщений для модерации.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Сообщение</th>
                    <th>Действия</th>
                </tr>
                <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= $message['id'] ?></td>
                    <td><?= htmlspecialchars($message['content']) ?></td>
                    <td class="actions">
                        <a href="moderate_message.php?id=<?= $message['id'] ?>&action=approve" class="approve-btn">Одобрить</a>
                        <a href="moderate_message.php?id=<?= $message['id'] ?>&action=reject" class="reject-btn">Отклонить</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <a href="logout.php" class="logout-btn">Выйти</a>
    </div>
</body>
</html>