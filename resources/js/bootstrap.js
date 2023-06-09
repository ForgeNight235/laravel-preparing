/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

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
