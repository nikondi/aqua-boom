@props([
    'price',
    'title',
    'description',
    'image'
])

<div class="service-card">
    <div class="service-card__img">
        <img src="{{ $image }}" alt="">
    </div>
    <div class="service-card__price">
        {{ number_format($price, 0, '.', ' ') }} ₽
    </div>
    <div class="service-card__title">
        {!! $title !!}
    </div>
    <div class="service-card__description">
        {!! $description !!}
    </div>
</div>
