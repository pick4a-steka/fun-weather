<?php
session_start(); // начинаем сессию

// Уничтожаем сессию, чтобы выйти из профиля
session_destroy();

// Перенаправляем пользователя на страницу входа или другую страницу
header("Location: index.php");
exit;
?>