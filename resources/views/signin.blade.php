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
    <title>Авторизация</title>
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

{{--auth section--}}
<section class="auth">
    <div class="error-checkout">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
    </div>

    <h2>Авторизация</h2>
    <form action="{{ route('auth.signin') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form_group">
            <label for="email">email</label>
            <input type="email" name="email" id="email">
            @error('email'){{$message}}@enderror
        </div>
        <div class="form_group">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            @error('password'){{$message}}@enderror
        </div>

        <button type="submit">Login</button>
    </form>
</section>

</body>
</html>
