<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
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

    public function destroy(Request $request)
    {
        $userId = $request->input('user_id');
        $shopId = $request->input('shop_id');

        Favorite::where('user_id', $userId)
            ->where('shop_id', $shopId)
            ->delete();

        return redirect()->route('index');
    }
}
