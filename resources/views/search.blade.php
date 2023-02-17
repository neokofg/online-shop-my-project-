<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
@isset($result)
    @if($result == '[]')
        <p>К сожалению мы ничего не нашли!</p>
    @else
        @foreach($result as $productItem)
            <a href="{{route('productPage',['id' => $productItem->type_id, 'product_id' => $productItem->id])}}"><p>{{$productItem->name}}</p></a>
        @endforeach
    @endif
@endisset
<x-footer></x-footer>
</body>
</html>
