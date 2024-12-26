<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = htmlspecialchars($_POST['content']);

    $sql = "INSERT INTO messages (content) VALUES (:content)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['content' => $content]);

    echo "Сообщение отправлено на модерацию!";
} else {
    header('Location: index.php');
    exit;
}
?>