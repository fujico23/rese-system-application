@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
<link rel="stylesheet" href="{{ asset('css/mypage.css')}}">
@endsection

@section('content')
<h2 class="mypage__name">{{Auth::user()->name }} さん</h2>

<div class="mypage-container">
    <div class="reservation">
        <h3 class="reservation__confirm">予約状況</h3>
        @foreach($reservations as $reservation)
        <div class="reservation__container">
            <div class="reservation__heading">
                <div class="clock-img">
                    <i class="fa-regular fa-clock fa-xl" style="color: #f5f7fa;"></i>
                </div>
                <h4 class="reservation__number">予約1</h4>
                <form action=" {{ route('mypage.reservation.delete', ['id' => $reservation->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="reservation__delete">
                        <button class="fa-regular fa-circle-xmark fa-bounce fa-xl" style="color: #f2f4f8;" type="submit" value="">
                    </div>
                </form>
            </div>

            <div class="table">
                <form action=" {{ route('mypage.reservation.update', ['id' => $reservation->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <table class="reservation__table">
                        <div class="table__row">
                            <tr class="table__row__inner">
                                <td class="table__row__name">Shop</td>
                                <td class="table__row__edit">{{ $reservation->shop->shop_name }}</td>
                            </tr>
                        </div>
                        <div class="table__row">
                            <tr class="table__row__inner">
                                <td class="table__row__name">Date</td>
                                <td class="table__row__edit">
                                    <input type="date" name="reservation_date" value="{{ $reservation->reservation_date }}" class="input-field">
                                </td>
                            </tr>
                        </div>
                        <div class="table__row">
                            <tr class="table__row__inner">
                                <td class="table__row__name">Time</td>
                                <td class="table__row__edit">
                                    <select name="reservation_time" class="select-field">
                                        <option value="option1">{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}</option>
                                        @foreach($reservationTimes as $time)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </div>
                        <div class="table__row">
                            <tr class="table__row__inner">
                                <td class="table__row__name">Number</td>
                                <td class="table__row__edit">
                                    <select name="number_of_guests" class="select-field">
                                        <option value="option1">{{ $reservation->number_of_guests }}</option>
                                        @for ($count = 1; $count <= 20; $count++) <option value="{{ $count }}">{{ $count }}</option>
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                        </div>
                    </table>
                    <div class="reservation__update">
                        <button class=" fa-regular fa-pen-to-square fa-xl" style="color: #f2f4f8;" type="submit" value="ボタン">
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>




    <div class="favorite-shop">
        <h3 class="favorite-shop__heading">お気に入り店舗</h3>
        <div class="card-container">
            @foreach($favorites as $favorite)
            <div class="card">
                <div class="shop__img">
                    <img src="{{ $favorite->shop->image_url }}" alt="{{ $favorite->shop->shop_name }}">
                </div>
                <div class="shop__details">
                    <div>
                        <h4 class="shop-name">{{ $favorite->shop->shop_name }}</h4>
                        <span class="shop-area hashtag">#{{ $favorite->shop->area->area_name }}</span>
                        <span class="shop-genre hashtag">#{{ $favorite->shop->genre->genre_name }}</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/detail/{{ $favorite->shop->id }}" class="card-footer-btn btn">詳しく見る</a>
                    <form action="{{ route('mypage.favorite.delete') }}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="favorite_id" value="{{ $favorite->id }}">
                        <button class="heart heart-grey" type="submit">
                            <i class="fa-solid fa-heart" style="color: #fc030f;"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('modal1')



@endsection