@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
<h2 class="mypage__name">{{Auth::user()->name }} さん</h2>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="mypage__container">
    <div class="reservation">
        <h3 class="reservation__confirm">予約状況</h3>
        @foreach($reservations as $reservation)
        <div class="reservation__container">
            <div class="reservation__heading">
                <div class="clock-img">
                    <i class="fa-regular fa-clock fa-xl" style="color: #f5f7fa;"></i>
                </div>
                <h4 class="reservation__number">予約1</h4>
                <form class="reservation-delete-form" action="{{ route('mypage.reservation.delete', ['id' => $reservation->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="reservation__delete">
                        <button class="fa-regular fa-circle-xmark fa-2xl" style="color: #f2f4f8;" type="submit" value=""></button>
                    </div>
                </form>
            </div>
            <div class="table">
                <form class="reservation-edit-form" action="{{ route('mypage.reservation.update', ['id' => $reservation->id]) }}" method="post">
                    @method('patch')
                    @csrf
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
                                    <input id="editableInput{{ $reservation->id }}" disabled type="date" name="reservation_date" value="{{ $reservation->reservation_date }}" class="input-field">
                                </td>
                            </tr>
                        </div>
                        <div class="table__row">
                            <tr class="table__row__inner">
                                <td class="table__row__name">Time</td>
                                <td class="table__row__edit">
                                    <select disabled id="mySelect{{ $reservation->id }}" name="reservation_time" class="editable select-field">
                                        <option value="{{ $reservation->reservation_time }}">{{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}</option>
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
                                    <select disabled id="mySelectNumber{{ $reservation->id }}" name="number_of_guests" class="editable select-field">
                                        <option value="{{ $reservation->number_of_guests }}">{{ $reservation->number_of_guests }}</option>
                                        @for ($count = 1; $count <= 20; $count++) <option value="{{ $count }}">{{ $count }}</option>
                                            @endfor
                                    </select>
                                </td>
                            </tr>
                        </div>
                    </table>
                    <div class="reservation__update">
                        <div class="reservation-edit">
                            <i class="fa-regular fa-pen-to-square fa-lg"></i>
                            <button id="enableEdit{{ $reservation->id }}" class="reservation-edit-btn btn" type="button" onclick="enableEdit('{{ $reservation->id }}')">編集</button>
                        </div>
                        <div class="reservation-submit">
                            <i class="fa-regular fa-paper-plane fa-lg"></i>
                            <button class="reservation-submit-btn btn" type="submit">確定</button>
                        </div>
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
                    <img src="{{ $favorite->shop->images->first()->image_url }}" alt="{{ $favorite->shop->shop_name }}">
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




<script>
    document.querySelectorAll('.reservation-delete-form').forEach(function(form) {
        form.onsubmit = function(event) {

            const isConfirmed = confirm('本当に予約を削除しますか？');

            if (!isConfirmed) {
                event.preventDefault();
            }
        };
    });
    // ボタンをクリックしたらSelectタブとInputを有効にする
    function enableEdit(id) {
        var editableElements = document.querySelectorAll("#editableInput" + id + ", #mySelect" + id + ", #mySelectNumber" + id);
        for (var i = 0; i < editableElements.length; i++) {
            editableElements[i].removeAttribute("disabled");
            editableElements[i].style.backgroundColor = "#fff";
            editableElements[i].style.color = "black";
        }
    }

    // 予約変更の確認ダイアログ
    document.querySelectorAll('.reservation-edit-form').forEach(form => {
        form.onsubmit = function(event) {
            const isConfirmed = confirm('本当に予約を変更しますか？');
            if (!isConfirmed) {
                event.preventDefault();
            }
        };
    });
</script>

@endsection