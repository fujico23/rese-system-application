@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('content')
<div class="thanks">
    <div class="thanks__inner">
        <h2 class="thanks__heading">ご予約ありがとうございます</h2>
        <div class="return-btn">
            <a class="return-btn__inner" href="/login">ログイン</a>
        </div>
    </div>
</div>
@endsection