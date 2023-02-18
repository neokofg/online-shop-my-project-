<!doctype html>
<html lang="en">
<x-head></x-head>
<body class="text-center" onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
<div class="container mt-5">
    <h2>Результаты поиска:</h2>
@isset($result)
    @if($result == '[]')
        <p class="mt-5">К сожалению мы ничего не нашли!</p>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">
            @foreach($result as $product)
                <div class="col">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="/images/{{$product->image}}" class="card-img-top" alt="{{$product->name}}" width="200" height="250">
                        <div class="card-body">
                            <a class="text-decoration-none" href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}"><h5 class="card-title">{{$product->name}}</h5></a>
                            <p class="card-text">{{Str::limit($product->description,50)}}</p>
                            <a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}" class="btn btn-primary">Открыть</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endisset
</div>
<x-footer></x-footer>
</body>
</html>
