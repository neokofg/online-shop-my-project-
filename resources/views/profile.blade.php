<!doctype html>
<html lang="en">
<x-head></x-head>
<body>
<x-navbar></x-navbar>
<div class="container mt-5">
    <div class="d-flex">
        <p>Имя: </p>
        <p class="text-primary">{{Auth::user()->name}}</p>
    </div>
    <div class="d-flex">
        <p>Email: </p>
        <p class="text-primary">{{Auth::user()->email}}</p>
    </div>
    <h4>Ваши заказы:</h4>
    <div class="row mx-auto">
        <div class="col">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach($orders as $order)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{$order->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$order->id}}" aria-expanded="false" aria-controls="flush-collapse{{$order->id}}">
                                {{$order->product->name}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$order->id}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <span class="d-flex justify-content-between">
                                    <p>Номер вашего заказа:</p>
                                    <p class="text-primary">{{$order->id}}</p>
                                </span>
                                <span class="d-flex justify-content-between">
                                    <p>Адрес:</p>
                                    <p class="text-primary">{{$order->destination}}</p>
                                </span>
                                <span class="d-flex justify-content-between">
                                    <p>Цена:</p>
                                    <p class="text-primary">{{$order->total_price}} ₽</p>
                                </span>
                                <span class="d-flex justify-content-between">
                                    <p>Дата размещения заказа:</p>
                                    <p class="text-primary">{{$order->created_at}}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<x-footer></x-footer>
</body>
</html>
