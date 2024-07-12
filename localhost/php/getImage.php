<?php
// Подключение к базе данных
$servername = "localhost";
$username = "u2703229_default";
$password = "6ET2GeA4ykbR3Dzc";
$dbname = "u2703229_default";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выполнение запроса на получение изображений из базы данных
$sql = "SELECT ImageData FROM Images"; // ImageData - название столбца с изображениями
$result = $conn->query($sql);

$images = array(); // Создаем массив для хранения данных об изображениях

// Если есть результаты запроса
if ($result->num_rows > 0) {
    // Добавляем данные об изображениях в массив
    while($row = $result->fetch_assoc()) {
        $images[] = array('ImageData' => base64_encode($row['ImageData'])); // Кодируем изображение в base64 и добавляем в массив
    }
    // Возвращаем массив в формате JSON
    echo json_encode($images);
} else {
    echo "0 results";
}

// Закрытие соединения с базой данных
$conn->close();
?>
