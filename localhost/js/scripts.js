document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM fully loaded and parsed");
    document.getElementById("contactLink").addEventListener("click", function(event) {
        event.preventDefault(); // Предотвратить стандартное поведение ссылки
        console.log("Contact link clicked");
        window.location.href = "contact.html"; // Перенаправление на другую страницу
    });
});