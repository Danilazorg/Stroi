<?php
// Подключаем данные для подключения базы данных
$link = new mysqli('cafeavru.mysql', 'cafeavru', 'D1fYU-qk', 'cafeavru_emba');
// Получаем id пользователя из куки
$id = $_COOKIE["UserID"];
// Запрос
$query = "UPDATE users SET user_cookie='' WHERE user_id = $id";
// Выполнение запроса
$link->query($query);
// Обнуление куки
setcookie('UserID', '');
// Переадресовываем браузер на страницу проверки нашего скрипта
header("Location: index.php");
exit;
?>
