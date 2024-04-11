<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function index () {
        $userId = Auth::id();
        $shops = Shop::join('shop_users', 'shops.id', '=', 'shop_users.shop_id')
        ->where('shop_users.user_id', $userId)
        ->select('shops.*')
        ->get();

        return view ('shop_management', compact('shops'));
    }

}
