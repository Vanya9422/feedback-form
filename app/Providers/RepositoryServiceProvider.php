<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->bindProviders();
    }

    /**
     * @return void
     */
    public function bindProviders(): void {
        if (config('repository.enabled')) {
            foreach (config('repository.repositories') as $repositoryContract => $repositoryClass) {
                $this->app->bind($repositoryContract, $repositoryClass);
            }
        }
    }
}
