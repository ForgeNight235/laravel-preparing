const slides = document.querySelector('.slides');
const prevBtn = document.querySelector('.prev-slide');
const nextBtn = document.querySelector('.next-slide');
const dots = document.querySelectorAll('.dot');

let currentSlide = 0;

function showSlide(slideIndex) {
    // Обновляем индекс текущего слайда
    currentSlide = slideIndex;

    // Перемещаем слайды с помощью CSS свойства transform
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;

    // Обновляем активный прямоугольник
    dots.forEach(dot => dot.classList.remove('active'));
    dots[currentSlide].classList.add('active');
}

function prevSlide() {
    // Переключаемся на предыдущий слайд
    currentSlide = (currentSlide === 0) ? slides.childElementCount - 1 : currentSlide - 1;
    showSlide(currentSlide);
}

function nextSlide() {
    // Переключаемся на следующий слайд
    currentSlide = (currentSlide === slides.childElementCount - 1) ? 0 : currentSlide + 1;
    showSlide(currentSlide);
}

// Добавляем обработчики событий на кнопки
prevBtn.addEventListener('click', prevSlide);
nextBtn.addEventListener('click', nextSlide);

// Добавляем обработчики событий на точки
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        showSlide(index);
    });
});
