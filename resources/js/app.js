import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const slideContainer = document.getElementById("slide-container");
const slideItems = document.querySelectorAll(".slide-item");
const numItems = slideItems.length;
const itemsPerPage = 4;
let currentPage = 0;

function showPage(page) {
    const startIndex = page;
    const endIndex = startIndex + itemsPerPage;

    slideItems.forEach((item, index) => {
        const adjustedIndex = (index + numItems) % numItems;
        item.style.display = adjustedIndex >= startIndex && adjustedIndex < endIndex ? "block" : "none";
    });
}

function nextPage() {
    currentPage = (currentPage + 1) % numItems;
    showPage(currentPage);
}

function prevPage() {
    currentPage = (currentPage - 1 + numItems) % numItems;
    showPage(currentPage);
}

showPage(currentPage);

// Adicione event listeners para os botões de navegação (próximo e anterior)
document.getElementById("next-btn").addEventListener("click", nextPage);
document.getElementById("prev-btn").addEventListener("click", prevPage);
