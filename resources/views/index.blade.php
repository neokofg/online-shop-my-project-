<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Neoko Store</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
{{--                <p>--}}
{{--                    <a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
{{--                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
{{--                </p>--}}
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach(App\Models\Product::take(9)->get() as $product)
                <div class="col">
                    <div class="card  mx-auto" style="width: 18rem;">
                        <img src="/images/{{$product->image}}" class="card-img-top" alt="{{$product->name}}" width="200" height="250">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{Str::limit($product->description,50)}}</p>
                            <a href="{{route('productPage',['id' => $product->type_id, 'product_id' => $product->id])}}" class="btn btn-primary">Открыть</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
<x-footer></x-footer>
</body>
</html>
