<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    @foreach($products as $product)
        <a href="{{route('productPage',['id' => $type_id, 'product_id' => $product->id])}}"><p>{{$product->name}}</p></a>
    @endforeach
<x-footer></x-footer>
</body>
</html>
