<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/thanks', [AuthController::class, 'thanks']);
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::post('/favorites/add', [FavoriteController::class, 'store'])->name('favorite.add');
    Route::delete('/favorites/delete', [FavoriteController::class, 'destroy'])->name('favorite.delete');
    Route::get('/detail/{shop}', [ShopController::class, 'show'])->name('shop.detail');

    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');
    Route::delete('mypage/favorite/delete', [UserController::class, 'destroy'])->name('mypage.favorite.delete');


    Route::post('/detail/{shop_id}/reservation', [ReservationController::class, 'store']);
    Route::get('/done', [ReservationController::class, 'done']);
    Route::patch('/mypage/reservation/{id}', [ReservationController::class, 'update']);
    Route::delete('/mypage/reservation/{id}', [ReservationController::class, 'destroy']);
});


//メール確認の通知
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//メール確認のリンクをクリックした後の処理
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/thanks');
})->middleware(['auth', 'signed'])->name('verification.verify');

//メール確認の再送信
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
