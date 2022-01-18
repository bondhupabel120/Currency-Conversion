<?php

use Illuminate\Support\Facades\Route;

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

/* Frontend */
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');

/* Backend */
Auth::routes();
Route::middleware('auth:web')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/logout', [App\Http\Controllers\UserController::class, 'userLogout'])->name('user.logout');

    /* Send Money */
    Route::get('/send/money', [App\Http\Controllers\ConversionController::class, 'sendMoney'])->name('send.money');
    Route::post('/money_check', [App\Http\Controllers\ConversionController::class, 'moneyCheck']); //ajax request
    Route::post('/save/send/money', [App\Http\Controllers\ConversionController::class, 'saveSendMoney'])->name('save.send.money');
});
