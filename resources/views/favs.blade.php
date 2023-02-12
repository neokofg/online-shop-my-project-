<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    <a href="{{route('index')}}">Назад</a>
    @foreach($products as $product)
        <p>{{$product->name}}</p>
        <button>Купить</button>
        <a href="{{route('cart.deleteFromFavs',$product->id)}}"><button>Удалить</button></a><br>
    @endforeach
</body>
</html>
