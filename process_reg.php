<?php

// Подключение к базе данных
$servername = "localhost";
$username_for_db = "root";
$password = "mysql";
$dbname = "usersFUN_WEATHER";

$conn = new mysqli($servername, $username_for_db, $password, $dbname);

if ($conn->connect_error) {
    die ("Connection field: " . $conn->connect_error);
}

// Получение данных из формы
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Хэширование пароля
$hash_password = password_hash($password, PASSWORD_BCRYPT);

// Проверка существования такого пользователя
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

// Вставка данных в таблицу
if (filter_var($email, FILTER_VALIDATE_EMAIL) && $result->num_rows == 0) {
    $sql = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$hash_password')";
}

if ($conn->query($sql) === TRUE) {
    echo "Регистрация успешна";
}
else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения
$conn->close();

header("Location: login.html"); // переход на форму входа на сайт

?>