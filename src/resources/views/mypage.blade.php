@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
<link rel="stylesheet" href="{{ asset('css/mypage.css')}}">
@endsection

@section('content')
<h2 class="mypage__name">testさん</h2>

<div class="mypage-container">
    <div class="reservation">
        <h3 class="reservation__confirm">予約状況</h3>
        <form action="">
            @csrf
            <div class="reservation__confirm__inner">
                <div class="reservation__heading">
                    <i class="fa-regular fa-clock" style="color: #74C0FC;"></i>
                    <h4 class="reservation__number">予約1</h4>
                    <div class="reservation__delete">
                        <i class="fa-regular fa-circle-xmark" style="color: #74C0FC;"></i>
                        <input class="fa-regular fa-circle-xmark" style="color: #74C0FC;" type="submit" value="">
                    </div>
                </div>
                <table class="reservation__table">
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Shop</td>
                            <td>仙人</td>
                        </tr>
                    </div>
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Date</td>
                            <td>2021-04-01</td>
                        </tr>
                    </div>
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Time</td>
                            <td>17:00</td>
                        </tr>
                    </div>
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Number</td>
                            <td>1人</td>
                        </tr>
                    </div>
                </table>
            </div>
            <div class="reservation__confirm__inner">
                <div class="reservation__heading">
                    <i class="fa-regular fa-clock" style="color: #74C0FC;"></i>
                    <h4 class="reservation__number">予約1</h4>
                    <div class="reservation__delete">
                        <i class="fa-regular fa-circle-xmark" style="color: #74C0FC;"></i>
                        <input class="fa-regular fa-circle-xmark" style="color: #74C0FC;" type="submit" value="">
                    </div>
                </div>
                <table class="reservation__table">
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Shop</td>
                            <td>仙人</td>
                        </tr>
                    </div>
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Date</td>
                            <td>2021-04-01</td>
                        </tr>
                    </div>
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Time</td>
                            <td>17:00</td>
                        </tr>
                    </div>
                    <div class="table__row">
                        <tr class="table__row__inner">
                            <td>Number</td>
                            <td>1人</td>
                        </tr>
                    </div>
                </table>
            </div>
        </form>
    </div>

    <div class="favorite-shop">
        <h3 class="favorite-shop__heading">お気に入り店舗</h3>
        <div class="card-container">
            <div class="card">
                <div class="shop__img">
                    <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="Shop 1">
                </div>
                <div class="shop__details">
                    <div>
                        <h4 class="shop-name">仙人</h4>
                        <span class="shop-area hashtag">#東京</span>
                        <span class="shop-genre hashtag">#寿司</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/detail" class="card-footer-btn btn">詳しく見る</a>
                    <form action="/submit" method="POST">
                        @csrf
                        <input type="hidden" name="heart" value="favorite_id">
                        <input class="heart" type="submit" value="&hearts;">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="shop__img">
                    <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="Shop 1">
                </div>
                <div class="shop__details">
                    <div>
                        <h4 class="shop-name">仙人</h4>
                        <span class="shop-area hashtag">#東京</span>
                        <span class="shop-genre hashtag">#寿司</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/detail" class="card-footer-btn btn">詳しく見る</a>
                    <form action="/submit" method="POST">
                        @csrf
                        <input type="hidden" name="heart" value="favorite_id">
                        <input class="heart" type="submit" value="&hearts;">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="shop__img">
                    <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="Shop 1">
                </div>
                <div class="shop__details">
                    <div>
                        <h4 class="shop-name">仙人</h4>
                        <span class="shop-area hashtag">#東京</span>
                        <span class="shop-genre hashtag">#寿司</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/detail" class="card-footer-btn btn">詳しく見る</a>
                    <form action="/submit" method="POST">
                        @csrf
                        <input type="hidden" name="heart" value="favorite_id">
                        <input class="heart" type="submit" value="&hearts;">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="shop__img">
                    <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="Shop 1">
                </div>
                <div class="shop__details">
                    <div>
                        <h4 class="shop-name">仙人</h4>
                        <span class="shop-area hashtag">#東京</span>
                        <span class="shop-genre hashtag">#寿司</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/detail" class="card-footer-btn btn">詳しく見る</a>
                    <form action="/submit" method="POST">
                        @csrf
                        <input type="hidden" name="heart" value="favorite_id">
                        <input class="heart" type="submit" value="&hearts;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection