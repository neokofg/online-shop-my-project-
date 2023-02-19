<!doctype html>
<html lang="en">
<x-head></x-head>
<body class="text-center" onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
    <h1 class="mt-5">Ваша корзина:</h1>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                    <div class="col">
                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="/images/{{$product->getImage($product->id)}}" class="card-img-top" alt="{{$product->name}}" width="200" height="250">
                            <div class="card-body">
                                <a class="text-decoration-none" href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}"><h5 class="card-title">{{$product->name}}</h5></a>
                                <p class="card-text">{{Str::limit($product->description,50)}}</p>
                                <a href="{{route('orders.pageOrder', $product->id)}}" class="btn btn-primary">Купить</a>
                                <a href="{{route('cart.deleteFromCart',$product->id)}}" class="btn btn-secondary">Удалить</a>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
<x-footer></x-footer>
</body>
</html>
