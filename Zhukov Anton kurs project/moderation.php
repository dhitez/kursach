<?php
require 'config.php';

$sql = "SELECT * FROM messages WHERE status = 'pending'";
$stmt = $pdo->query($sql);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Модерация сообщений</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Модерация сообщений</h1>
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
            <td>
                <a href="moderate_message.php?id=<?= $message['id'] ?>&action=approve">Одобрить</a>
                <a href="moderate_message.php?id=<?= $message['id'] ?>&action=reject">Отклонить</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>