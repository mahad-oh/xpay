<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EWallet;

Route::get('/', [EWallet::class,'index'])->name('dashboard');
Route::post('/recharger',[EWallet::class,'recharge'])->name('recharger');
Route::get('/reset',[EWallet::class,'reset'])->name('reset');
