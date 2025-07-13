<?php

use App\Http\Controllers\MarketingController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/commissions', [MarketingController::class, 'getCommission'])->name('api.commission');
Route::post('/pay', [PaymentController::class, 'pay'])->name('api.pay');
