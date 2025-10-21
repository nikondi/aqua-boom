<?php /**
 * @var \App\Models\Review $review
 */ ?>
@props([
    'review'
])
<div class="review-card">
    <div class="review-card__rate">
    @for($i = 0; $i < $review->rate; $i++)
        <img src="/assets/img/star.svg" alt="" width="21" height="21"/>
    @endfor
    </div>
    <div class="review-card__name">{{ $review->name }}</div>
    <div class="review-card__text">{!! $review->text !!}</div>
</div>
