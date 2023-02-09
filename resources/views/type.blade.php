<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
    @foreach($products as $product)
        <a href="{{route('productPage',['id' => $type_id, 'product_id' => $product->id])}}"><p>{{$product->name}}</p></a>
    @endforeach
</body>
</html>
