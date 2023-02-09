<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
    @if(!Auth::check())
        <a href="{{route('login')}}"><button>Войти/Регистрация</button></a>
    @else
        @if(Auth::user()->role == '1')
            <a href="{{route('admin')}}"><button>Админ</button></a>
        @endif
        <a href="{{route('profile')}}"><button>Профиль</button></a>
        <a href="{{route('cart.GetCart')}}"><button>Корзина</button></a>
        <a href="{{route('cart.GetFavs')}}"><button>Любимые</button></a>
        <a href="{{route('auth.logoutUser')}}"><button>Выйти</button></a>
    @endif
    <br>
    @foreach($types as $type)
        <a href="{{route('typePage',$type->id)}}">{{$type->name}}</a><br>
    @endforeach
    <form action="{{route('index')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Поиск">
        <button>Найти</button>
    </form>
    @isset($result)
        @if($result == '[]')
            <p>К сожалению мы ничего не нашли!</p>
        @else
            @foreach($result as $productItem)
                <a href="{{route('productPage',['id' => $productItem->type_id, 'product_id' => $productItem->id])}}"><p>{{$productItem->name}}</p></a>
            @endforeach
        @endif
    @endisset
</body>
</html>
