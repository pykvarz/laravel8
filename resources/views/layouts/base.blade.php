<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a href="{{ route('index') }}" class="navbar-brand mr-auto">Главная</a>
            <a href="{{ route('register') }}" class="nav-item nav-link">Регистрация</a>
            <a href="{{ route('login') }}" class="nav-item nav-link">Вход</a>
            <a href="{{ route('home') }}" class="nav-item nav-link">Мои объявления</a>
            <form action="{{ route('logout') }}" method="post" class="form-inline">
                @csrf
                <input type="submit" class="btn btn-danger" value="Выход">
            </form>
        </nav>
        <h1 class="my-3 text-center">Объявления</h1>
        @yield('main')
    </div>

</body>
</html>
