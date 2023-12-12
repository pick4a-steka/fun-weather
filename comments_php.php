<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Подключение к базе данных
$servername = "localhost";
$username_for_db = "root";
$password = "mysql";
$dbname = "usersFUN_WEATHER";

$conn = new mysqli($servername, $username_for_db, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос на получение комментариев
$username = $_SESSION['username'];
$sql = "SELECT users.username, comments.comment_text, comments.created_at FROM comments INNER JOIN users ON comments.user_id = users.id ORDER BY comments.created_at DESC";
$result = $conn->query($sql);

// Передача данных в формате JSON клиенту
$comments = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

// Отправка JSON
header('Content-Type: application/json');
echo json_encode($comments);

// Закрытие соединения с базой данных
$conn->close();

?>