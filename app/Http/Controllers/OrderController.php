<?php

namespace App\Http\Controllers;

use App\Services\Orders\Models\Order;
use App\Services\Payments\PaymentService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order, Request $request)
    {
        return view('orders.show', compact('order'));
    }

    public function payment(Order $order, PaymentService $service)
    {
        $payment = $service
            ->createPayment()
            ->payable($order)
            ->run();

        return to_route('payments.checkout', $payment->uuid);
    }
}
