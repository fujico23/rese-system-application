<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with(['area', 'genre'])->get();
        return view('index', compact('areas', 'genres', 'shops'));
    }

    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $shopId = $request->input('shop_id');

        $existingFavorite = Favorite::where('user_id', $userId)
            ->where('shop_id', $shopId)
            ->first();
        if (!$existingFavorite) {
            Favorite::create([
                'user_id' => $userId,
                'shop_id' => $shopId
            ]);
        }
        return redirect()->route('index');
    }

    public function show(Shop $shop)
    {
        return view('detail', compact('shop'));
    }
}
