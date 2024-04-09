@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/authentication.css')}}">
@endsection

@section('content')
<div class="auth__container">
    <h2 class="auth__container__heading">Registration</h2>
    <form class="auth-form" action="/register" method="post">
        @csrf
        <div class="auth-form__inner">
            <div class="auth-form__group">
                <i class="fa-solid fa-user fa-lg"></i>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
            </div>
            <p class="auth-error">@error('name')
                {{ $message }}
                @enderror
            </p>
            <div class="auth-form__group">
                <i class="fa-solid fa-envelope fa-lg"></i>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <p class="auth-error">@error('email')
                {{ $message }}
                @enderror
            </p>
            <div class="auth-form__group">
                <i class="fa-solid fa-unlock-keyhole fa-lg"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <p class="auth-error">@error('password')
                {{ $message }}
                @enderror
            </p>
            <div class="auth-form__btn">
                <input class="auth-form__group__button btn" type="submit" value="登録">
            </div>
        </div>
    </form>
</div>
@endsection