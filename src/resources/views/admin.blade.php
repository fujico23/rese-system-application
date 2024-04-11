@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="admin">
    <h1>管理者画面</h1>
    <div class="admin__container">
        <table class="admin__table">
            <div class="admin__table__inner">
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>Email</th>
                    <th>役割</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->role_name }}</td>
                    <td><a href="{{ route('users.show', $user) }}">詳細</a></td>
                </tr>
                @endforeach
            </div>
        </table>
    </div>
</div>
@endsection