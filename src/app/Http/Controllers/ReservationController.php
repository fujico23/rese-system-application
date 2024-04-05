<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['reservation_date', 'reservation_time', 'number_of_guests', 'shop_id']);
        $user_id = Auth::id();
        $data['user_id'] = $user_id;

        Reservation::create($data);

        return view('done');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('mypage')->with('success', '予約が削除されました');
    }

    public function update(Request $request, $id)
    {
        // バリデーションを行います
        $validatedData = $request->validate([
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        // 予約を取得します
        $reservation = Reservation::findOrFail($id);

        // 取得した予約の情報を更新します
        $reservation->update([
            'reservation_date' => $validatedData['reservation_date'],
            'reservation_time' => $validatedData['reservation_time'],
            'number_of_guests' => $validatedData['number_of_guests'],
        ]);

        // 更新後、マイページにリダイレクトします
        return redirect()->route('mypage')->with('success', '予約が更新されました');
    }
    //
}
