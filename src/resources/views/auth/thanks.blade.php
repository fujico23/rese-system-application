@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('content')
<div class="thanks__container">
    <div class="thanks__container__inner">
        <h2 class="thanks__heading">会員登録ありがとうございます。</h2>
        <p class="thanks__container__inner-message">メール認証が完了しました。</p>
        <p class="thanks__container__inner-message">お気に入り登録・予約・Mypageの閲覧が</p>
        <p class="thanks__container__inner-message">可能になりました。</p>
        <div class="thanks__container-btn">
            <a class="thanks__container-btn-link btn" href="/login">ログイン</a>
        </div>
    </div>
</div>
@endsection