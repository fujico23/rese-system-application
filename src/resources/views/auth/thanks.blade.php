@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('content')
<div class="form__inner">
    <h2 class="form__heading">会員登録ありがとうございます</h2>
    <form class="auth-form" action="/login" method="post">
        @csrf
        <div class="auth-form__inner">
            <div class="auth-form__group btn">
                <input class="auth-form__group__button btn__inner" type="submit" value="ログインする">
            </div>
        </div>
    </form>
</div>
@endsection