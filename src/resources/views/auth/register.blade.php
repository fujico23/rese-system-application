@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="form__inner">
    <h2 class="form__heading">Registration</h2>
    <form class="auth-form" action="/register" method="post">
        @csrf
        <div class="auth-form__inner">
            <div class="auth-form__group">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
            </div>
            <p class="auth-error">@error('name')
                {{ $message }}
                @enderror
            </p>
            <div class="auth-form__group">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <p class="auth-error">@error('email')
                {{ $message }}
                @enderror
            </p>
            <div class="auth-form__group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <p class="auth-error">@error('password')
                {{ $message }}
                @enderror
            </p>
            <div class="auth-form__group btn">
                <input class="auth-form__group__button btn__inner" type="submit" value="登録">
            </div>
        </div>
    </form>
</div>
@endsection