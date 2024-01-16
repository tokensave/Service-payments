<?php

use App\Http\Controllers\Api\Payments\Callbacks\StripeController;
use App\Http\Controllers\Api\Payments\Callbacks\TinkoffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('payments/callbacks/tinkoff', TinkoffController::class)->name('payments.callbacks.tinkoff');
Route::post('payments/callbacks/stripe', StripeController::class)->name('payments.callbacks.stripe');
