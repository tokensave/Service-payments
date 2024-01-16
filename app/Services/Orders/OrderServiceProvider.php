<?php

namespace App\Services\Orders;

use App\Services\Orders\Listeners\CancellOrderListener;
use App\Services\Orders\Listeners\CompleteOrderListener;
use App\Services\Orders\Models\Order;
use App\Services\Payments\Events\PaymentCancelledEvent;
use App\Services\Payments\Events\PaymentCompletedEvent;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Relation::enforceMorphMap([
            'order' => Order::class,
        ]);

        if ($this->app->runningInConsole()){

            $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        }

        Event::listen(PaymentCompletedEvent::class,CompleteOrderListener::class);
        Event::listen(PaymentCancelledEvent::class,CancellOrderListener::class);

    }
}
