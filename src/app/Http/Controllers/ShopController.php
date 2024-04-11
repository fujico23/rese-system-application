<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $role_id = $user->role_id;
        } else {
            $role_id = null; // または、ログインしていない場合に適切と思われる別の値を設定
        }
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with(['area', 'genre', 'images'])
            ->get();

        $favoriteShopIds = Auth::user() ? Auth::user()
            ->favorites->pluck('shop_id')
            ->toArray() : [];

        $shops->each(function ($shop) use ($favoriteShopIds) {
            $shop->isFavorited = in_array($shop->id, $favoriteShopIds);
        });

        return view('index', compact('role_id','areas', 'genres', 'shops'));
    }

    public function search(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::GenreSearch($request->genre_id)
            ->AreaSearch($request->area_id)
            ->KeywordSearch($request->keyword)
            ->get();

        $favoriteShopIds = Auth::user() ? Auth::user()
            ->favorites->pluck('shop_id')
            ->toArray() : [];

        $shops->each(function ($shop) use ($favoriteShopIds) {
            $shop->isFavorited = in_array($shop->id, $favoriteShopIds);
        });

        return view('index', compact('areas', 'genres', 'shops'));
    }


    public function show(Shop $shop)
    {
        $startTime = Carbon::createFromTime(17, 0, 0);
        $endTime = Carbon::createFromTime(21, 0, 0);

        $reservationTimes = []; // 予約可能な時間を格納する配列を初期化

        // 開始時間から15分ごとに繰り返し生成し、配列に追加
        for ($time = $startTime; $time->lessThanOrEqualTo($endTime); $time->addMinutes(15)) {
            $reservationTimes[] = $time->format('H:i'); // 時間を配列に追加
        }

        return view('detail', compact('shop', 'reservationTimes')); // 予約可能な時間をビューに渡す
    }
}
