<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    <a href="{{route('index')}}">Назад</a>
    <p>{{Auth::user()->name}}</p>
    <p>{{Auth::user()->email}}</p>
    <h4>Ваши заказы:</h4>
    @foreach($orders as $order)
        <div style="border: 3px solid black; max-width: 500px">
            <p>Номер вашего заказа: {{$order->id}}</p>
            <p>Адрес: {{$order->destination}}</p>
            <p>Цена: {{$order->total_price}} руб.</p>
            <p>Дата размещения заказа: {{$order->created_at}}</p>
        </div>
    @endforeach
</body>
</html>
