<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    <br>
    @foreach($types as $type)
        <a href="{{route('typePage',$type->id)}}">{{$type->name}}</a><br>
    @endforeach
    <form action="{{route('index')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Поиск">
        <button>Найти</button>
    </form>
    @isset($result)
        @if($result == '[]')
            <p>К сожалению мы ничего не нашли!</p>
        @else
            @foreach($result as $productItem)
                <a href="{{route('productPage',['id' => $productItem->type_id, 'product_id' => $productItem->id])}}"><p>{{$productItem->name}}</p></a>
            @endforeach
        @endif
    @endisset
</body>
</html>
