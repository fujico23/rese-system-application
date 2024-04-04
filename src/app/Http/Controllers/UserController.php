<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $favorites = Favorite::with('shop')
            ->where('user_id', $user->id)
            ->get();

        return view('mypage', compact('favorites'));
    }

    public function destroy(Request $request)
    {
        $favoriteId = $request->input('favorite_id');

        Favorite::find($favoriteId)->delete();

        return redirect()->route('mypage');
    }
    //
}
