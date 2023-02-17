<!doctype html>
<html lang="en">
<x-head></x-head>
<style>
    .container {
        max-width: 960px;
    }
</style>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

</script>
<body>
<x-navbar></x-navbar>
@foreach($product as $productItem)
<div class="container mt-5">
    <main>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Ваша корзина</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{$productItem->name}}</h6>
                        </div>
                        <span class="text-muted">{{$productItem->price}} Рублей</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Доставка</h6>
                        </div>
                        <span class="text-muted">{{600}} Рублей</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Всего (Рублей)</span>
                        <strong>{{$productItem->price + 600}}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Адрес доставки</h4>
                <form action="{{route('orders.newOrder',$productItem->id)}}" method="GET">
                @csrf
                    <input type="hidden" name="total_price" value="{{$productItem->price + 600}}">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" name="destination" class="form-control" id="address" placeholder="Красильникова 45, блок...." required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Страна</label>
                            <select class="form-select" id="country" required>
                                <option value="">Выбрать...</option>
                                <option>Республика Саха (Якутия)</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">Город</label>
                            <select class="form-select" id="state" required>
                                <option value="">Выбрать...</option>
                                <option>Якутия</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Индекс</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Оплата</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="debit">Дебетовая карта</label>
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Имя на карте</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Номер карты</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Дата</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </main>
</div>
    @endforeach
<x-footer></x-footer>
</body>
</html>
