<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Loaitour;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('urlAdmin',getenv('TEMPLATES_URL_ADMIN'));
        view()->share('urlPublic',getenv('TEMPLATES_URL_PUBLIC'));
        view()->share('urlLogin',getenv('TEMPLATES_URL_LOGIN'));

        //header
        $objLoaitour = new Loaitour;
        $objItemsLT = $objLoaitour -> getItemsNP();
        view::share('objItemsLT',$objItemsLT);
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
