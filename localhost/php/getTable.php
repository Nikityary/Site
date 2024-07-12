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

// Выполнение SQL запроса для получения данных
$sql = "SELECT requestId, userName, email, details FROM Requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Вывод данных каждой строки
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["requestId"]) . "</td>
                <td>" . htmlspecialchars($row["userName"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["details"]) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Нет записей</td></tr>";
}

// Закрытие соединения
$conn->close();
?>
