<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
    @foreach($product as $productItem)
        <h2>{{$productItem->name}}</h2>
        <img width="200px" src="/images/{{$productItem->image}}" alt="{{$productItem->name}}">
        <p>{{$productItem->price}} руб.</p>
        <p>{{$productItem->description}}</p>
        <p>Осталось {{$productItem->available}} шт!</p>
        <ul>
        @foreach($decodedChars as $chars => $value)
            <li style="display:flex">
                <p>{{{$chars}}}:</p>
                <p>{{{$value}}}</p>
            </li>
        @endforeach
        </ul>
        <form action="{{route('cart.addToCart')}}" method="GET">
            @csrf
            <input type="text" style="display:none" name="id" value="{{$productItem->id}}">
            @if(Auth::check())
                @foreach($cartIds as $cartId)
                    @if($cartId == $productItem->id)
                        <a href="{{route('cart.GetCart')}}"><button type="button">Оно в вашей корзине!</button></a>
                        @php($i = 1)
                    @endif
                @endforeach
                @if($i == 0)
                    <button type="submit">Добавить в корзину</button>
                @endif
            @endif
        </form>
        <form action="{{route('cart.addToFavs')}}" method="GET">
            @csrf
            <input type="text" style="display:none" name="id" value="{{$productItem->id}}">
            @if(Auth::check())
                @php($a = 0)
                @foreach($favsIds as $favsId)
                    @if($favsId == $productItem->id)
                        <a href="{{route('cart.GetFavs')}}"><button type="button">Оно в ваших любимых!</button></a>
                        @php($a = 1)
                    @endif
                @endforeach
                @if($a == 0)
                    <button type="submit">Добавить в любимые</button>
                @endif
            @endif
        </form>
    @endforeach
    <div>
        <form action="{{route('newComment')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Комментарии</h3>
            <input type="text" style="display:none" value="{{$productItem->id}}" name="product_id">
            <textarea name="comment" placeholder="Комментарий" cols="40" rows="5"></textarea><br>
            <div style="display:flex">
                <input name="stars" id="range" type="range" min="1" max="5" step="1">
                <p style="margin-left: 30px" id="rangeValue">3</p>
            </div>
            <input name="image" type="file"><br>
            <button>Отправить</button>
        </form>
        @foreach($comments as $comment)
            <div style="border: 2px solid black;width:200px">
                <h3>{{$comment->user->name}}</h3>
                <h4>{{$comment->stars}}</h4>
                <p>{{$comment->comment}}</p>
                <img src="/images/{{$comment->image}}" width="100px" alt="{{$comment->stars}}">
            </div>
        @endforeach
    </div>
</body>
<script type="text/javascript">
    const range = document.getElementById('range');
    const rangeValue = document.getElementById('rangeValue');
    range.oninput = function(){
        rangeValue.innerHTML = range.value;
    }
</script>
</html>
