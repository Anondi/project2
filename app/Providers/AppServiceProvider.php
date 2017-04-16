<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontEnd.includes.menu',  function ($view){
           $categories=Category::where('publicationStatus',1)->get();
           $view->with('categories',$categories);
        });
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
