@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('content')
<div class="thanks__container">
    <div class="thanks__container__inner">
        <h2 class="thanks__heading">書き込みありがとうございました！</h2>
        <div class="thanks__container-btn">
            <a class="thanks__container-btn-link btn" href="{{ route('shop.detail', ['shop' => $shop->id]) }}">戻る</a>
        </div>
    </div>
</div>
@endsection