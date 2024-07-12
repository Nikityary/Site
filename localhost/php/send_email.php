<?php
// Подключение к базе данных MySQL
$servername = "localhost";
$username = "u2703229_default";
$password = "6ET2GeA4ykbR3Dzc";
$dbname = "u2703229_default";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Установка кодировки соединения
$conn->set_charset("utf8mb4");

// Получение данных от пользователя
$userName = $_POST['userName'];
$email = $_POST['email'];
$details = $_POST['details'];

// Подготовка SQL запроса с использованием подготовленного выражения
$sql = "INSERT INTO Requests (userName, email, details) VALUES (?, ?, ?)";

// Создание подготовленного выражения
$stmt = $conn->prepare($sql);

// Привязка параметров
$stmt->bind_param("sss", $userName, $email, $details);

// Выполнение запроса
if ($stmt->execute() === TRUE) {
    echo "Сообщение успешно отправлено.";
} else {
    echo "Ошибка: " . $sql . "<br>" . $stmt->error;
}

// Закрытие подготовленного выражения и соединения с базой данных
$stmt->close();
$conn->close();
?>
