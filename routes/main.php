<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::view('/registration', 'registration.index')->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::view('/login', 'login.index')->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::redirect('/', '/registration');
Route::get('currency/{currency}', CurrencyController::class)->name('currency');


Route::get('orders', [OrderController::class, 'index'])->name('orders');
Route::get('orders/{order:uuid}', [OrderController::class, 'show'])->name('orders.show')->whereUuid('order');
Route::post('orders/{order:uuid}/payment', [OrderController::class, 'payment'])->name('orders.payment')->whereUuid('order');

Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
Route::get('subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
Route::post('subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('subscriptions/{subscription:uuid}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
Route::post('subscriptions/{subscription:uuid}', [SubscriptionController::class, 'payment'])->name('subscriptions.payment');



Route::get('payments/{payment:uuid}/checkout', [PaymentController::class, 'checkout'])->name('payments.checkout')->whereUuid('payment');
Route::post('payments/{payment:uuid}/method', [PaymentController::class, 'method'])->name('payments.method')->whereUuid('payment');
Route::get('payments/{payment:uuid}/process', [PaymentController::class, 'process'])->name('payments.process')->whereUuid('payment');
Route::post('payments/{payment:uuid}/complete', [PaymentController::class, 'complete'])->name('payments.complete')->whereUuid('payment');
Route::post('payments/{payment:uuid}/cancel', [PaymentController::class, 'cancel'])->name('payments.cancel');
Route::get('payments/success', [PaymentController::class, 'success'])->name('payments.success');
Route::get('payments/failure', [PaymentController::class, 'failure'])->name('payments.failure');


