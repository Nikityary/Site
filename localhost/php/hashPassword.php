<?php
session_start();

// Данные для подключения к базе данных
$servername = "localhost";
$username = "u2703229_default";
$password = "6ET2GeA4ykbR3Dzc";
$dbname = "u2703229_default";

try {
    // Создаем подключение к базе данных
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);
    // Устанавливаем режим ошибок PDO на исключения
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получаем данные из POST-запроса
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    // Подготовка SQL-запроса для получения пользователя по логину
    $stmt = $pdo->prepare('SELECT * FROM Admins WHERE userName = ?');
    $stmt->execute([$userName]);
    $user = $stmt->fetch();

    // Проверяем, найден ли пользователь
    if ($user) {
        // Проверяем совпадает ли пароль
        if (password_verify($password, $user['admPassword'])) {
            // Успешный вход
            $_SESSION['userName'] = $user['userName'];
            echo json_encode(['success' => true, 'redirect' => '/mainAdmin.html']);
            exit();
        } else {
            // Неправильный пароль
            echo json_encode(['success' => false, 'message' => 'Неправильный логин или пароль']);
            exit();
        }
    } else {
        // Пользователь не найден
        echo json_encode(['success' => false, 'message' => 'Неправильный логин или пароль']);
        exit();
    }
} catch (PDOException $e) {
    // Обрабатываем ошибки подключения к базе данных
    echo json_encode(['success' => false, 'message' => 'Ошибка соединения с базой данных: ' . $e->getMessage()]);
    exit();
}
?>
