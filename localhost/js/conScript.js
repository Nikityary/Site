document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('.contact-me__form');

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Предотвращаем стандартное действие отправки формы

        // Получаем данные из формы
        var userName = document.getElementById('userName').value;
        var email = document.getElementById('email').value;
        var details = document.getElementById('details').value;

        // Создаем новый объект XMLHttpRequest
        var xhr = new XMLHttpRequest();
        var url = 'php/send_email.php';

        // Устанавливаем метод и адрес URL
        xhr.open('POST', url, true);

        // Устанавливаем заголовок запроса
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Отправляем данные формы
        xhr.send('userName=' + encodeURIComponent(userName) + '&email=' + encodeURIComponent(email) + '&details=' + encodeURIComponent(details));

        // Обработка ответа от сервера
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert(xhr.responseText); // Показываем сообщение об успешной отправке или ошибке
                    // Можно также выполнить другие действия после успешной отправки
                } else {
                    console.error(xhr.responseText); // Выводим сообщение об ошибке в консоль
                }
            }
        };
    });
});
