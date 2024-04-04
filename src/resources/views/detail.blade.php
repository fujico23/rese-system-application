@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('content')

<!-- モーダルウィンドウ -->
<input type="checkbox" id="pop-up" checked>
<div class="overlay">
    <ul class="modal__inner">
        <li>
            <label class="close" for="pop-up">
                <i class="fa-solid fa-square-xmark fa-lg" style="color: #0d09fb;"></i>
            </label>
        </li>
        <li class="modal__link"><a href="/">Home</a></li>
        <li class="modal__link">
            <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">Logout</button>
            </form>
        </li>
        <li class="modal__link"><a href="/mypage">Mypage</a></li>
    </ul>
</div>

<!-- ショップ情報 -->
<div class="shop-container">
    <div class="shop__heading">
        <a class="return" href="/">&lsaquo;</a>
        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
    </div>
    <div class="shop__img">
        <img src="{{ $shop->image_url }}" alt="Shop 1">
    </div>

    <div class="shop-details">
        <div class="hashtag">
            <span class="shop-area">#{{ $shop->area->area_name }}</span>
            <span class="shop-genre">#{{ $shop->genre->genre_name }}</span>
        </div>
        <div class="shop-description">
            <p>{{ $shop->description }}</p>
        </div>
    </div>
</div>

<!-- 予約情報-->
<div class="reservation-container">
    <div class="reservation-container__inner">
        <form action="/store" method="post">
            @csrf
            <div class="reservation-form__inner">
                <h2 class="reservation__heading">予約</h2>
                <div class="reservation-date form__tag">
                    <input type="date">
                </div>
                <div class="reservation-time form__tag">
                    <select name="" id="">
                        <option value="">17:00</option>
                    </select>
                </div>
                <div class="numer-of-guests form__tag">
                    <select name="" id="">
                        <option value="">1人</option>
                    </select>
                </div>

                <table class="reservation__table">
                    <tr class="table__row">
                        <td>Shop</td>
                        <td>{{ $shop->shop_name }}</td>
                    </tr>
                    <tr class="table__row">
                        <td>Date</td>
                        <td>2021-04-01</td>
                    </tr>
                    <tr class="table__row">
                        <td>Time</td>
                        <td>17:00</td>
                    </tr>
                    <tr class="table__row">
                        <td>Number</td>
                        <td>1人</td>
                    </tr>
                </table>
            </div>
            <div class="reservation__btn">
                <button type="submit" name="">予約する</button>
            </div>
        </form>
    </div>
</div>
@endsection