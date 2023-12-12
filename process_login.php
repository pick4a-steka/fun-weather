<?php

session_start();

// Подключение к базе данных
$servername = "localhost";
$username_for_db = "root";
$password = "mysql";
$dbname = "usersFUN_WEATHER";

$conn = new mysqli($servername, $username_for_db, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $authenticated_username = check_user($email, $password, $conn);

    if ($authenticated_username !== false) {
        // Вход успешен, сохраняем имя пользователя в сессии
        $_SESSION['username'] = $authenticated_username['username'];
        $_SESSION['id'] = $authenticated_username['id'];
        header("Location: index.php"); // переход на главную страницу
    }
    else {
        $_SESSION['error_message'] = 'Uncorrect email or password';
        header ("Location: login.html");
    }
    exit;
}

function check_user ($email, $password, $conn) {
    // Запрос к базе данных для получения пароля
    $sql = "SELECT id, username, password_hash FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Получаем результат запроса
        $row = $result->fetch_assoc();
        $hash_passwd = $row['password_hash'];

        // Проверка корректности введённого пароля
        if (password_verify($password, $hash_passwd)) {
            return array('username' => $row['username'], 'id' => $row['id']);
        }
    }
    return false;
}

?>