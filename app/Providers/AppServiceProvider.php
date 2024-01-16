<?php

namespace App\Providers;

use Domain\Feedback\Factories\FeedbackRepositoryFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->singleton(FeedbackRepositoryFactory::class, function ($app) {
            return new FeedbackRepositoryFactory();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
