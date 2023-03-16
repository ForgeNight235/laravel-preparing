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
    <title>Добавить товар</title>
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

<main>
    <div class="registration">
        <h2>Создание товара</h2>
        <div class="error-checkout">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="container">
            <form action="{{ route('goods.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_group">
                    <label for="title">Название товара</label>
                    <input type="text" name="title" id="title">
                    @error('title'){{$message}}@enderror
                </div>

                <div class="form_group">
                    <label for="short_text">Краткое описание</label>
                    <input type="text" name="short_text" id="short_text">
                    @error('short_text'){{$message}}@enderror
                </div>

                <div class="form_group">
                    <label for="image_path">Изображение</label>
                    <input type="file" name="image_path" id="image_path">
                    @error('image_path'){{$message}}@enderror
                </div>

                <button type="submit">Создать</button>
            </form>
        </div>
    </div>

</main>

</body>
</html>
