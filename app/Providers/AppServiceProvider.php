<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (request()->getHost() == 'localhost')
        {
            $this->app->bind('path.public', function() {
                return 'http://localhost/dashboard/public/';
            });
        }
        else
        {
            $this->app->bind('path.public', function() {
                return '';
            });
        }
//        $this->app->instance('path.storage', 'http://localhost/dashboard/');
//        dd(storage_path());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
