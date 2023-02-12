<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    <form action="{{route('auth.registerNewUser')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Имя"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <button>Зарегистрироваться</button>
    </form>
    <a href="{{route('login')}}"><button>Войти</button></a>
</body>
</html>
