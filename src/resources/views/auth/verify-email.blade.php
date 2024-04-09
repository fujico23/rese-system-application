@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/authentication.css')}}">
@endsection

@section('content')
<div class="auth__container">
    <h2 class="auth__container__heading">{{ __('メールアドレスの確認') }}</h2>
    <form class="auth-form" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="auth-form__inner">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('あなたのEメールアドレスに新しい認証リンクが送信されました。') }}
            </div>
            @endif

            <p class="auth-form__group">{{ __('以下の機能はメールアドレスの認証後に可能となります。') }}</p>
            <ul class="auth-form__group-list">
                <li>{{ __('お気に入り登録') }}</li>
                <li>{{ __('予約機能') }}</li>
                <li>{{ __('Mypageの閲覧') }}</li>
            </ul>
            <p class="auth-form__group">{{ __('会員登録時に指定したメールアドレス宛てにメールが届いていないかご確認をお願いいたします。') }}</p>
            <p class="auth-form__group">{{ __('会員登録メールが届かない場合、下のリンクをクリックして再度メールをリクエストして下さい。') }}</p>
            <div class="auth-form__btn">
                <button type="submit" class="auth-form__group__button btn">{{ __('再送信') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection