@if(!Auth::check())
    @if(!Request::is('login'))
        @if(!Request::is('register'))
        <a href="{{route('login')}}"><button>Войти/Регистрация</button></a>
        @endif
    @endif
@else
    @if(Auth::user()->role == '1')
        <a href="{{route('admin')}}"><button>Админ</button></a>
    @endif
    @if(!Request::is('/'))
        <a href="{{route('index')}}"><button>Главная</button></a>
    @endif
    <a href="{{route('profile')}}"><button>Профиль</button></a>
    <a href="{{route('cart.GetCart')}}"><button>Корзина</button></a>
    <a href="{{route('cart.GetFavs')}}"><button>Любимые</button></a>
    <a href="{{route('auth.logoutUser')}}"><button>Выйти</button></a>
@endif
