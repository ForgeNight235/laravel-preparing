<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset("assets/js/js.js") }}"></script>
    <title>Men's gift</title>
</head>
<body>
    {{--    header section--}}
    <header>
        <div class="container">
            <nav>
                <a href="/" class="header-link">
                    <span>Mg</span>
                    Men's gift
                </a>
                <ul>
                    @guest()
                        <li class="a nav-links"><a href="{{route('signin')}}">Войти</a></li>
                        <li class="a nav-links"><a href="{{route('signup')}}">Регистрация</a></li>
                    @endguest
                    @auth()
                        <li class="a nav-links">{{ Auth::user()->name }}</li>
                        <li class="a nav-links"><a href="{{ route('goods.create') }}">Добавить предмет</a></li>
                        <li class="a nav-links"><a href="{{ route('auth.logout') }}">Выход</a></li>
                    @endauth

                </ul>
            </nav>
        </div>
    </header>
{{--путь к статичным картинкам сайта    --}}
{{--{{ asset("assets/images/...") }}--}}

{{--    путь к загружаемым файлам сайта--}}
{{--    src="public/storage/images/..."--}}
    {{--    slider section--}}
{{--    <script>--}}
{{--        const slides = document.querySelector('.slides');--}}
{{--        const prevBtn = document.querySelector('.prev-slide');--}}
{{--        const nextBtn = document.querySelector('.next-slide');--}}
{{--        const dots = document.querySelectorAll('.dot');--}}

{{--        let currentSlide = 0;--}}

{{--        function showSlide(slideIndex) {--}}
{{--            // Обновляем индекс текущего слайда--}}
{{--            currentSlide = slideIndex;--}}

{{--            // Перемещаем слайды с помощью CSS свойства transform--}}
{{--            slides.style.transform = `translateX(-${currentSlide * 100}%)`;--}}

{{--            // Обновляем активный прямоугольник--}}
{{--            dots.forEach(dot => dot.classList.remove('active'));--}}
{{--            dots[currentSlide].classList.add('active');--}}
{{--        }--}}

{{--        function prevSlide() {--}}
{{--            // Переключаемся на предыдущий слайд--}}
{{--            currentSlide = (currentSlide === 0) ? slides.childElementCount - 1 : currentSlide - 1;--}}
{{--            showSlide(currentSlide);--}}
{{--        }--}}

{{--        function nextSlide() {--}}
{{--            // Переключаемся на следующий слайд--}}
{{--            currentSlide = (currentSlide === slides.childElementCount - 1) ? 0 : currentSlide + 1;--}}
{{--            showSlide(currentSlide);--}}
{{--        }--}}

{{--        // Добавляем обработчики событий на кнопки--}}
{{--        prevBtn.addEventListener('click', prevSlide);--}}
{{--        nextBtn.addEventListener('click', nextSlide);--}}

{{--        // Добавляем обработчики событий на точки--}}
{{--        dots.forEach((dot, index) => {--}}
{{--            dot.addEventListener('click', () => {--}}
{{--                showSlide(index);--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}

{{--    <script src="{{ asset("assets/resources/js/js.js") }}"></script>--}}
    <div class="slider-container">
        <p style="text-align: center; padding: 0 0 15px">js код слайдера не подключается!</p>
        <div class="slides">
            <div class="slide"><img src="{{asset("assets/images/slider/slide1.jpg")}}"></div>
            <div class="slide"><img src="{{asset("assets/images/slider/slide2.jpg")}}"></div>
            <div class="slide"><img src="{{asset("assets/images/slider/slide3.jpg")}}"></div>
        </div>
        <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <div class="slider-buttons">
            <button class="prev-slide">&lt;</button>
            <button class="next-slide">&gt;</button>
        </div>
    </div>

    {{--    Main section--}}
    <main>
        <div class="container">

                @if(count($goods))
                    <div class="goods-article">
                        <h3>Продукты магазина</h3>
                        <form action="/" class="search" method="get">
                            <input type="text" name="search" placeholder="Поиск по сайту">
                            <button type="submit">Найти</button>
                        </form>
                    </div>

                <div class="goods">
                    @foreach($goods as $good)
                        <div class="good">
                            <p class="ordered__count">{{ $good->ordered }}</p>
                            <img
                                src="{{ $good->image_url }}"
                                alt="{{ $good->title }}"
                            >
                            <div class="good__info">
                                <h4>{{ $good->title }}</h4>
                                <span>{{ $good->short_text }}</span>
                            </div>

                        </div>
                    @endforeach
                </div>

                @else
                    <h2>На данный момент в магазине нет товаров (</h2>
                @endif

                {{ $goods->links('components.paginate') }}

        </div>
    </main>

</body>
</html>
