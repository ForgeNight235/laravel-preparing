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
    <title>Регистрация</title>
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
                    <li class="a nav-links"><a href="{{ route('auth.logout') }}">Выход</a></li>
                @endauth

            </ul>
        </nav>
    </div>
</header>



</body>
</html>
