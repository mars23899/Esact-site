document.addEventListener("DOMContentLoaded", function() {
    // Animação do campo de pesquisa ao clicar no ícone
    document.getElementById("search-btn").addEventListener("click", function() {
        document.querySelector(".search-box").classList.toggle("active");
    });
});
let slideIndex = 0;
const slides = document.querySelectorAll(".slide");
const titleElement = document.getElementById("changing-title");
const titles = ["O Nosso Campus", "Laboratórios EsACT", "Auditório EsACT", "Eventos EsACT"];

function showSlides() {
    slides.forEach((slide, index) => {
        slide.style.display = "none";
    });
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    titleElement.textContent = titles[slideIndex - 1];
    setTimeout(showSlides, 3000);
}

document.addEventListener("DOMContentLoaded", showSlides);
