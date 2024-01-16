<?php

namespace App\Services\Subscriptions;

use App\Services\Payments\Events\PaymentCancelledEvent;
use App\Services\Payments\Events\PaymentCompletedEvent;
use App\Services\Subscriptions\Listeners\ActivateSubscriptionListener;
use App\Services\Subscriptions\Listeners\CancellSubscriptionListener;
use App\Services\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Relation::enforceMorphMap([
            'subscription' => Subscription::class,
        ]);

        Event::listen(PaymentCompletedEvent::class, ActivateSubscriptionListener::class);
        Event::listen(PaymentCancelledEvent::class, CancellSubscriptionListener::class);

        if ($this->app->runningInConsole()){
            $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        }
    }
}
