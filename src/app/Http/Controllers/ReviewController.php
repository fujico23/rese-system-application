<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Shop $shop)
    {
        return view('shop_review', compact('shop'));
    }

    public function store(Shop $shop, Request $request)
    {
        $reservation = $shop->reservations()
            ->where('user_id', Auth::id())
            ->first();
        if ($reservation) {
            $reviewData = $request->only('reservation_id', 'comment', 'rating');
            Review::create($reviewData);

            $status = $request->only('status')['status'];
            $reservation->update(['status' => $status]);

            return view('review_done', compact('shop'));
        } else {
            return back()->with('error', '予約が見つかりませんでした。');
        }
    }

    public function index(Shop $shop)
    {
        $reservations = $shop->reservations()->with('review','user')->get();
        return view('shop_review_index', compact('reservations'));
    }
}
