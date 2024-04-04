<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with(['area', 'genre'])->get();

        $favoriteShopIds = Auth::user() ? Auth::user()->favorites()->pluck('shop_id')->toArray() : [];
        $shops->each(function ($shop) use ($favoriteShopIds) {
            $shop->isFavorited = in_array($shop->id, $favoriteShopIds);
        });
        return view('index', compact('areas', 'genres', 'shops'));
    }


    public function show(Shop $shop)
    {
        return view('detail', compact('shop'));
    }
}
