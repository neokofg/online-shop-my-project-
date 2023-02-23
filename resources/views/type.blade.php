<!doctype html>
<html lang="en">
<x-head></x-head>
<style>
    body{
        opacity: 0;
        transition: opacity 0.5s;
    }
</style>
<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
    <div class="text-center mt-5">
        <h2>Продукты категории {{App\Models\Type::typeName($type_id)}}:</h2>
    </div>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                <div class="col">
                    <div class="card  mx-auto" style="width: 18rem;">
                        <img src="/images/{{$product->getImage($product->image)}}" class="card-img-top" alt="{{$product->name}}" width="200" height="250">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{Str::limit($product->description,50)}}</p>
                            <a href="{{route('productPage',['id' => $type_id, 'product_id' => $product->id])}}" class="btn btn-primary">Открыть</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $products->links() }}
        </div>
    </div>
<x-footer></x-footer>
</body>
</html>
