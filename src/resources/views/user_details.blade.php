@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user_details.css')}}">
@endsection

@section('content')
<div class="user-details">
    <h2 class="user-details__header">ユーザー詳細</h2>
    <div class="user-details__container">
        <table class="user-details__container__table">
            <div class="user-details__container__table__inner">
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">ID</th>
                    <td class="user-detail__container__table-row__detail">{{ $user->id }}</td>
                </tr>
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">名前</th>
                    <td class="user-detail__container__table-row__detail">{{ $user->name }}</td>
                </tr>
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">Email</th>
                    <td class="user-detail__container__table-row__detail">{{ $user->email }}</td>
                </tr>
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">会員登録日時</th>
                    <td class="user-detail__container__table-row__detail">{{ $user->created_at }}</td>
                </tr>
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">役割</th>
                    <td class="user-detail__container__table-row__detail">
                        <form class="user-detail__container__table-row__form-patch" action="{{ route('role.update', $user) }}" method="POST">
                            @csrf
                            @method('patch')
                            <select class="user-detail__container__table-role-select" name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                <option class="user-detail__container__table-role-option" value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->role_name }}
                                </option>
                                @endforeach
                            </select>
                            <button class="user-detail__container__table__btn-patch" type="submit">変更</button>
                        </form>
                    </td>
                </tr>
                @if($role_id == 2)
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">店舗名</th>
                    <td class="user-detail__container__table-row__detail">
                        <form class="user-detail__container__table-row__form-post" action="{{ route('admin.users.assign', $user) }}" method="POST">
                            @csrf
                            <select class="user-detail__container__table-shop-select" name="shop_id" id="shop_id">
                                @foreach ($shops as $shop)
                                <option class="user-detail__container__table-shop-option" value="{{ $shop->id }}">
                                    {{ $shop->shop_name }}
                                </option>
                                @endforeach
                            </select>
                            <button class="user-detail__container__table__btn-post" type="submit">作成</button>
                        </form>
                    </td>
                </tr>

                @if($shopUsers->count() > 0)
                @foreach($shopUsers as $shopUser)
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">店舗代表一覧</th>
                    <td class="user-detail__container__table-row__detail">
                        <form class="user-detail__container__table-row__form-delete" action="{{ route('admin.users.remove', ['user' => $user, 'shop' => $shopUser->shop_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="shop_id" value="{{ $shopUser->shop_id }}">
                            <input type="" name="" value="{{ App\Models\Shop::find($shopUser->shop_id)->shop_name }}" readonly>
                            <button class="user-detail__container_table__btn-delete" type="submit">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif

                @endif
                <tr class="user-detail__container__table-row">
                    <th class="user-detail__container__table-row__header">レビュー一覧</th>
                    <td class="user-detail__container__table-row__detail"></td>
                </tr>
            </div>
        </table>
    </div>
</div>
@endsection