<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    <a href="{{route('index')}}">Назад</a>
    <p>{{Auth::user()->name}}</p>
    <p>{{Auth::user()->email}}</p>
</body>
</html>
