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
    public function index()
    {
        $userId = Auth::id();
        $shops = Shop::join('shop_users', 'shops.id', '=', 'shop_users.shop_id')
            ->where('shop_users.user_id', $userId)
            ->select('shops.*')
            ->with('images')
            ->get();

        $areas = Area::all();
        $genres = Genre::all();

        return view('shop_management', compact('shops', 'areas', 'genres'));
    }

    public function update(Request $request, Shop $shop)
    {    // リクエストから更新するデータを取得
        $data = $request->only(['shop_name', 'area_id', 'genre_id', 'description', 'is_active']);

        // もし送信されたデータがnullの場合、現在の値を代入する
        if ($data['area_id'] === null) {
            $data['area_id'] = $shop->area_id;
        }

        if ($data['genre_id'] === null) {
            $data['genre_id'] = $shop->genre_id;
        }

        // 画像がアップロードされているかを確認
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = $file->store('shop_images', 'public');
            $data['image_url'] = $filename;
        }

        // is_active の状態を更新する
        $data['is_active'] = $request->has('is_active') ? true : false;

        // ショップ情報を更新
        $shop->update($data);

        // 画像の関連データを保存する
        if ($request->hasFile('image_url')) {
            // 画像がアップロードされている場合、Imageモデルを使ってデータベースに保存する
            $image = new Image();
            $image->shop_id = $shop->id; // 店舗IDを設定
            $image->image_url = $data['image_url']; // 画像のファイルパスを保存
            $image->save();
        }

        return redirect()->route('management')->with('success', '店舗が更新されました！');
    }

    public function show()
    {
        $userId = Auth::id();
        $shops = Shop::join('shop_users', 'shops.id', '=', 'shop_users.shop_id')
            ->where('shop_users.user_id', $userId)
            ->select('shops.*')
            ->get();

        return view('shop_reservation_confirm', compact('shops'));
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('management')->with('success', '画像が削除されました！');

    }
}
