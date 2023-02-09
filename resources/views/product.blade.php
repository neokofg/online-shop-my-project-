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
</body>
</html>
