<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
    @foreach($product as $productItem)
        <p>{{$productItem->name}}</p>
        <form action="{{route('orders.newOrder',$productItem->id)}}" method="GET">
            @csrf
            <input type="text" name="total_price" style="display:none" value="{{$productItem->price + 600}}">
            <p>Цена продукта: {{$productItem->price}} руб.</p>
            <p>Цена доставки: {{600}} руб.</p>
            <p>Сумма заказа: {{$productItem->price + 600}} руб.</p>
            <input type="text" placeholder="Адрес" name="destination"><br>
            <button type="submit">Отправить заказ</button>
        </form>
    @endforeach
</body>
</html>
