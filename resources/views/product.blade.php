<!doctype html>
<html lang="en">
<x-head></x-head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
    .material-symbols-outlined {
        font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 48
    }
</style>

<body>
<x-navbar></x-navbar>
    @foreach($product as $productItem)
        <div class="container mt-5">
            <h2 class="mb-5">{{$productItem->name}}</h2>
            <div class="row mx-auto">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <img class="rounded" width="400px" src="/images/{{$productItem->image}}" alt="{{$productItem->name}}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="text-dark">Характеристики:</p>
                                </li>
                                @foreach($decodedChars as $chars => $value)
                                <li class="list-group-item">
                                    <div class="justify-content-between d-flex">
                                        <p class="text-secondary">{{$chars}}</p>
                                        <p class="text-dark">{{$value}}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{$productItem->price}} ₽ <span class="badge bg-secondary"><del>{{$productItem->price + 5000}}</del></span></h3>
                                <div class="row">
                                    <form class="col" action="{{route('cart.addToCart')}}" method="GET">
                                        @csrf
                                        <input type="text" style="display:none" name="id" value="{{$productItem->id}}">
                                        @if(Auth::check())
                                            @foreach($cartIds as $cartId)
                                                @if($cartId == $productItem->id)
                                                    <a href="{{route('cart.GetCart')}}"><button type="button" class="btn btn-primary text-nowrap fw-lighter">Оно в вашей корзине!</button></a>
                                                    @php($i = 1)
                                                @endif
                                            @endforeach
                                            @if($i == 0)
                                                <button type="submit" class="btn btn-primary text-nowrap fw-lighter ">Добавить в корзину</button>
                                            @endif
                                        @endif
                                    </form>
                                    <form class="col" action="{{route('cart.addToFavs')}}" method="GET">
                                        @csrf
                                        <input type="text" style="display:none" name="id" value="{{$productItem->id}}">
                                        @if(Auth::check())
                                            @php($a = 0)
                                            @foreach($favsIds as $favsId)
                                                @if($favsId == $productItem->id)
                                                    <a href="{{route('cart.GetFavs')}}"><button type="button" class="btn btn-secondary text-nowrap fw-lighter">Оно в ваших любимых!</button></a>
                                                    @php($a = 1)
                                                @endif
                                            @endforeach
                                            @if($a == 0)
                                                <button type="submit" class="btn btn-secondary text-nowrap fw-lighter">Добавить в любимые</button>
                                            @endif
                                        @endif
                                    </form>
                                </div>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            Осталось {{$productItem->available}} шт.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-auto mt-5">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{$productItem->description}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <h4>{{$midAriphStar}} Звезд!</h4>--}}
    <div class="container mt-5">
        <div class="row mx-auto">
            <div class="col">
                <h3>Комментарии:</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('newComment')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$productItem->id}}" name="product_id">
                            <div class="input-group">
                                <textarea name="comment" placeholder="Комментарий" rows="5" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <div class="d-flex col-3 mt-3 text-center">
                                <input name="stars" class="form-range col" id="range" type="range" min="1" max="5" step="1">
                                <span class="col d-flex justify-content-center">
                                    <p class="text-dark" id="rangeValue">3</p>
                                    <span class="material-symbols-outlined" style="color:gold">star</span>
                                </span>
                            </div>
                            <div class="input-group mb-3">
                                <input name="image" type="file" class="form-control" id="inputGroupFile02">
                            </div>
                            <button type="submit" class="btn btn-secondary">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($comments as $comment)
        <div class="row mx-auto mt-5">
                <div class="col">
                    <div class="card" style="height: 300px">
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-3 align-self-center ">
                                    <img class="rounded object-fit-contain img-fluid img-thumbnail" style="height:250px;width:100%" src="/images/{{$comment->image}}" alt="{{$comment->stars}}">
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="text-dark">{{$comment->user->name}}:</h3>
                                        <div class="d-inline-flex justify-content-start">
                                            <h3 class="text-dark">{{$comment->stars}}</h3>
                                            <span class="material-symbols-outlined" style="color:gold">star</span>
                                        </div>
                                    </div>
                                    <p class="text-dark mt-3">{{$comment->comment}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    @endforeach
<x-footer></x-footer>
</body>
<script type="text/javascript">
    const range = document.getElementById('range');
    const rangeValue = document.getElementById('rangeValue');
    range.oninput = function(){
        rangeValue.innerHTML = range.value;
    }
</script>
</html>
