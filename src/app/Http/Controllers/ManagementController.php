<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function index () {
        $userId = Auth::id();
        $shops = Shop::join('shop_users', 'shops.id', '=', 'shop_users.shop_id')
        ->where('shop_users.user_id', $userId)
        ->select('shops.*')
        ->get();

        $areas = Area::all();
        $genres = Genre::all();
        $images = Image::all();

        return view ('shop_management', compact('shops', 'areas', 'genres'));
    }

    public function update(Request $request, Shop $shop)
    {
        // リクエストから更新するデータを取得
        $data = $request->only(['shop_name', 'area_id', 'genre_id', 'description']);
        // もし送信されたデータがnullの場合、現在の値を代入する
        if ($data['area_id'] === null) {
            $data['area_id'] = $shop->area_id;
        }

        if ($data['genre_id'] === null) {
            $data['genre_id'] = $shop->genre_id;
        }

        $shop->update($data);

        return redirect()->route('management')->with('success', '店舗が更新されました！');
    }

}
