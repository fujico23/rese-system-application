@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')
<div class="card-container">
  <div class="card">
    <img src="shop1.jpg" alt="Shop 1">
    <div class="details">
      <div>
        <h3>仙人</h3>
        <span>#東京</span>
        <span>#寿司</span>
      </div>
      <button class="btn">詳しく見る</button>
    </div>
    <span class="heart">&hearts;</span>
  </div>

  <div class="card">
    <img src="shop2.jpg" alt="Shop 2">
    <div class="details">
      <div>
        <h3>牛助</h3>
        <span>#大阪府</span>
        <span>焼肉</span>
      </div>
      <button class="btn">詳しく見る</button>
    </div>
    <span class="heart">&hearts;</span>
  </div>

  <div class="card">
    <img src="shop3.jpg" alt="Shop 3">
    <div class="details">
      <div>
        <h3>Shop 3</h3>
        <span>福岡県</span>
        <span>居酒屋</span>
      </div>
      <button class="btn">詳しく見る</button>
    </div>
    <span class="heart">&hearts;</span>
  </div>

  <div class="card">
    <img src="shop4.jpg" alt="Shop 4">
    <div class="details">
      <div>
        <h3>ルーク</h3>
        <span>東京都</span>
        <span>イタリアン</span>
      </div>
      <button class="btn">詳しく見る</button>
    </div>
    <span class="heart">&hearts;</span>
  </div>
</div>
@endsection