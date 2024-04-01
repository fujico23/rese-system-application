@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('content')
<div class="form__inner">
    <h2 class="form__heading">Login</h2>
    <form class="auth-form" action="/login" method="post">
        @csrf
        <div class="auth-form__inner">
            <div class="auth-form__group">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <p class="auth-error">
                @error('email')
                {{ $message }}
                @enderror
            </p>
            <div class="auth-form__group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <p class="auth-error">
                @error('password')
                {{ $message }}
                @enderror
            </p>
            <p class="auth-form__remember">
                <label for="remember">
                    <input id="remember" type="checkbox" name="remember">
                    <span class="">ログイン状態を保持する</span>
                </label>
            </p>
            <div class="auth-form__group btn">
                <input class="auth-form__group__button btn__inner" type="submit" value="ログイン">
            </div>
        </div>
    </form>
</div>
@endsection