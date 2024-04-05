@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('content')

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
        <form action="/detail/{shop}/reservation" method="post">
            @csrf
            <div class="reservation-form__inner">
                <h2 class="reservation__heading">予約</h2>
                <div class="reservation-date form__tag">
                    <input type="date" name="reservation_date" id="reservation_date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="reservation-time form__tag">
                    <select name="reservation_time">
                        @foreach($reservationTimes as $time)
                        <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="numer-of-guests form__tag">
                    <select name="number_of_guests">
                        @for ($count = 1; $count <= 20; $count++) 
                        <option value="{{ $count }}">{{ $count }}</option>
                         @endfor
                    </select>
                </div>
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                <table class="reservation__table">
                    <tr class="table__row">
                        <td>Shop</td>
                        <td>{{ $shop->shop_name }}</td>
                    </tr>
                    <tr class="table__row">
                        <td>Date</td>
                        <td id="reservation_date_display">選択して下さい</td>
                    </tr>
                    <tr class="table__row">
                        <td>Time</td>
                        <td id="reservation_time">選択して下さい</td>
                    </tr>
                    <tr class="table__row">
                        <td>Number</td>
                        <td id="guest_count">選択して下さい</td>
                    </tr>
                </table>
            </div>
            <div class="reservation__btn">
                @auth
                <button type="submit" name="reservation_button">予約する</button>
                @else
                <button type="button" onclick="openModal()">予約する</button>
                @endauth
            </div>
        </form>
    </div>
</div>

@if (Auth::check())
@include('modal1')
@else
@include('modal2')
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectReservationTimeElement = document.querySelector('select[name="reservation_time"]');
        var reservationTimeElement = document.getElementById('reservation_time');

        var selectNumberOfGuestsElement = document.querySelector('select[name="number_of_guests"]');
        var guestCountElement = document.getElementById('guest_count');

        var reservationDateElement = document.getElementById('reservation_date');
        var reservationDateDisplayElement = document.getElementById('reservation_date_display');

        selectReservationTimeElement.addEventListener('change', function() {
            reservationTimeElement.textContent = selectReservationTimeElement.value;
        });

        selectNumberOfGuestsElement.addEventListener('change', function() {
            var guestCount = selectNumberOfGuestsElement.value;
            guestCountElement.textContent = guestCount + "人";
        });

        reservationDateElement.addEventListener('change', function() {
            reservationDateDisplayElement.textContent = reservationDateElement.value;
        });
    });
</script>
@endsection