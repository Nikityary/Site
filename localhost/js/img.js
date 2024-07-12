document.addEventListener("DOMContentLoaded", function() {
    // Создаем запрос к PHP скрипту, который возвращает изображения из базы данных
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/getImage.php", true); // Замените "get_images.php" на путь к вашему PHP-скрипту
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var images = JSON.parse(xhr.responseText); // Получаем массив изображений из JSON-ответа
            images.forEach(function(image, index) {
                // Создаем новый элемент изображения
                var img = document.createElement("img");
                img.src = "data:image/jpeg;base64," + image.ImageData; // Устанавливаем источник изображения из base64-кодированной строки
                img.alt = "Изображение " + (index + 1); // Устанавливаем альтернативный текст изображения
                // Вставляем изображение в соответствующий элемент на странице
                document.querySelectorAll(".interest-image")[index].appendChild(img);
            });
        }
    };
    xhr.send();
});