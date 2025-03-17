<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EWallet;

Route::get('/', function(){
    return redirect()->route('home');
})->name('dashboard');
Route::get('/home', [EWallet::class,'index'])->name('home');
Route::get('/topup', [EWallet::class,'topup'])->name('topup');
Route::post('/recharger',[EWallet::class,'recharge'])->name('recharger');
Route::get('/reset',[EWallet::class,'reset'])->name('reset');
