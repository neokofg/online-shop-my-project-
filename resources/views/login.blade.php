<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
    <form action="{{route('auth.loginUser')}}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <button>Войти</button>
    </form>
    <a href="{{route('register')}}"><button>Зарегистрироваться</button></a>
</body>
</html>
