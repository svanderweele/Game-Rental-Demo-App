<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Rebing\GraphQL\Support\Facades\GraphQL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // GraphQL::addType(\App\GraphQL\Types\UserType::class, 'user');
    }
}
