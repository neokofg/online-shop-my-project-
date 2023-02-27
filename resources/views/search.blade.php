<!doctype html>
<html lang="en">
<x-head></x-head>
<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
<div class="container mt-5">
    <h2 class="text-center">Результаты поиска:</h2>
@isset($result)
    @if($result == '[]')
        <p class="mt-5 text-center">К сожалению мы ничего не нашли!</p>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">
            @foreach($result as $product)
                <x-card :product="$product"/>
            @endforeach
        </div>
    @endif
@endisset
</div>
<x-footer></x-footer>
</body>
</html>
