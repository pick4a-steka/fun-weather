<?php

session_start();

// Подключение к базе данных
$servername = "localhost";
$username_for_db = "root";
$password = "mysql";
$dbname = "usersFUN_WEATHER";

$conn = new mysqli($servername, $username_for_db, $password, $dbname);

if ($conn->connect_error) {
    die ("Connection field: " . $conn->connect_error);
}

$user_id = $_SESSION['id'];
$comment_text = $_POST['commentText'];
$current_datetime = date("Y-m-d H:i:s");

// SQL-запрос для вставки комментария в базу данных
$sql = "INSERT INTO comments (comment_text, created_at, user_id) VALUES ('$comment_text', '$current_datetime', '$user_id')";

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения с базой данных
header("Location: index.php");
$conn->close();

?>