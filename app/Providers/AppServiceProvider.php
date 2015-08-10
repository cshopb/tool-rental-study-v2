<?php

namespace App\Providers;

use App\Tool;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('message', null);

        $tools = Tool::latest('published_at')->published()->get();
        view()->share('tools', $tools);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
