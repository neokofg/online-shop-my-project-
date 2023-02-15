<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    <a href="{{route('index')}}">Назад</a>
    @foreach($products as $product)
        <p>{{$product->name}}</p>
        <a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}"><button>Купить</button></a>
        <a href="{{route('cart.deleteFromFavs',$product->id)}}"><button>Удалить</button></a><br>
    @endforeach
</body>
</html>
