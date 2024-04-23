@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
<link rel="stylesheet" href="{{ asset('css/shop_review_index.css')}}">
@endsection

@section('content')
<section class="review-section">
    <h2 class="review-section__header">REVIEW</h2>
    @foreach ($reservations as $reservation)
    @if ($reservation->review)
    <ul class="review-section__container">
        <li class="review-section__container__group">
            <div class="review-section__container__group__inner review-area">
                <p class="name">{{ $reservation->user->name }}さん</p>
                <p class="star{{ $reservation->review->rating }}"></p>
                <p class="comment">{{ $reservation->review->comment }}</p>
                <p class="date">{{ $reservation->review->created_at->format('Y年m月d日') }}</p>
            </div>
            <a href="#">商品を見る</a>
        </li>
    </ul>
    @endif
    @endforeach
</section>
@endsection