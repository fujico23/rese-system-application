@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')
<div class="card-container">
  @foreach ($shops as $shop)
  <div class="card">
    <div class="shop__img">
      <img src="{{ $shop->image_url }}" alt="{{ $shop->shop_name }}">
    </div>
    <div class="shop__details">
      <div>
        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
        <span class="shop-area hashtag">#{{ $shop->area->area_name }}</span>
        <span class="shop-genre hashtag">#{{ $shop->genre->genre_name }}</span>
      </div>
    </div>
    <div class="card-footer">
      <a href="{{ route('shop.detail', $shop) }}" class="card-footer-btn btn">詳しく見る</a>
      <form action="{{ route('favorite.add') }}" method="POST">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <button class="heart" type="submit">&hearts;</button>
      </form>
    </div>
  </div>
  @endforeach

</div>
@endsection