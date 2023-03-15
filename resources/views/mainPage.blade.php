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
    <title>Men's gift</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="/" class="header-link">
                    <span>Mg</span>
                    Men's gift
                </a>
                <ul>

                    <li class="a nav-links">Link 1</li>
                    <li class="a nav-links">Link 2</li>
                    <li class="a nav-links">Войти</li>
                    <li class="a nav-links">Регистрация</li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="goods">
                @if(count($goods))
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

                @else
                    <h2>На данный момент в магазине нет товаров (</h2>
                @endif
            </div>
            @if(count($goods))
                {{ $goods->links('components.paginate') }}
            @endif

        </div>
    </main>

</body>
</html>
