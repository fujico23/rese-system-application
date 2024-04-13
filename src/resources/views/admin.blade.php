@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('content')
<div class="admin">
    <h2 class="admin__header">管理者画面</h2>
    <div class="admin__container">
        <table class="admin__container__table">
            <div class="admin__table__inner">
                <tr class="admin__container__table-row">
                    <th class="admin__container__table-row__header">ID</th>
                    <th class="admin__container__table-row__header">名前</th>
                    <th class="admin__container__table-row__header">Email</th>
                    <th class="admin__container__table-row__header">役割</th>
                    <th class="admin__container__table-row__header"></th>
                </tr>
                @foreach ($users as $user)
                <tr class="admin__container__table-row">
                    <td class="admin__container__table-row__detail">{{ $user->id }}</td>
                    <td class="admin__container__table-row__detail">{{ $user->name }}</td>
                    <td class="admin__container__table-row__detail">{{ $user->email }}</td>
                    <td class="admin__container__table-row__detail">{{ $user->role->role_name }}</td>
                    <td class="admin__container__table-row__detail"><a href="{{ route('users.show', $user) }}">詳細</a></td>
                </tr>
                @endforeach
            </div>
        </table>
    </div>
</div>
@endsection