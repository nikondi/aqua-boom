<?php
/**
 * @var \App\Models\Service $service
 */
?>
@props([
    'service',
])

<div class="service-card">
    <div class="service-card__img">
        <img src="{{ $service->getImageUrl() }}" alt="">
    </div>
    <div class="service-card__price">
        От {{ number_format($service->price, 0, '.', ' ') }} ₽
    </div>
    <div class="service-card__title">
        {!! $service->name !!}
    </div>
    <div class="service-card__description">
        {!! $service->description !!}
    </div>
</div>
