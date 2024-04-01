@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="form__inner">
    <h2 class="form__heading">{{ __('メールアドレスの確認') }}</h2>
    <form class="auth-form" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="auth-form__inner">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('あなたのEメールアドレスに新しい認証リンクが送信されました。') }}
            </div>
            @endif

            <p class="auth-form__group">{{ __('入力したメールアドレスに確認メールが届いていないかをご確認ください。') }}</p>
            <p class="auth-form__group">{{ __('メールが届かない場合、下のリンクをクリックして再度メールをリクエストして下さい。') }}</p>
            <div class="auth-form__group btn">
                <button type="submit" class="auth-form__group__button btn__inner">{{ __('再送信') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection