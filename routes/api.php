<?php

use App\Http\Controllers\Api\Payments\Callbacks\StripeController;
use App\Http\Controllers\Api\Payments\Callbacks\TinkoffController;
use App\Http\Controllers\Api\Payments\Callbacks\YookassaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('payments/callbacks/tinkoff', TinkoffController::class)->name('payments.callbacks.tinkoff');
Route::post('payments/callbacks/stripe', StripeController::class)->name('payments.callbacks.stripe');
Route::post('payments/callbacks/yookassa', YookassaController::class)->name('payments.callbacks.yookassa');

