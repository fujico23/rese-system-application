<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Shop;
use App\Models\ShopUser;

class AdminController extends Controller
{
    public function admin()
    {
        $users = User::with('role')->get();
        return view('admin', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $shops = Shop::all();
        $role_id = $user->role_id;
        $shopUsers = ShopUser::where('user_id', $user->id)->get();
        return view('user_details', compact('shopUsers','user', 'roles', 'shops', 'role_id'));
    }

    public function update(Request $request, User $user)
    {
        $user->update(['role_id' => $request->role_id]);
        return redirect()->route('users.show', $user);
    }

    public function store(Request $request, User $user)
    {
        // リクエストからshop_idを取得する
        $shopId = $request->input('shop_id');
        // 同じ組み合わせが既に存在するかチェックする
        $existingShopUser = ShopUser::where('user_id', $user->id)
            ->where('shop_id', $shopId)
            ->first();

        if ($existingShopUser) {
            return redirect()->back()->with('error', '既にこの店舗の代表者になっています');
        }
        ShopUser::create([
            'user_id' => $user->id,
            'shop_id' => $shopId,
        ]);
        return redirect()->route('users.show', ['user' => $user]);
    }

    public function remove(Request $request,User $user)
    {
        $shopId = $request->input('shop_id');
        ShopUser::where('user_id', $user->id)->where('shop_id', $shopId)->delete();
        return redirect()->back()->with('success', '店舗割り当てが削除されました');
    }
}
