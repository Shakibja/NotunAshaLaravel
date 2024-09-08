<?php

namespace App\Providers;

use App\Models\Backend\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use View;

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
      Schema::defaultStringLength(191);
      Paginator::useBootstrap();
      View::composer('frontend.includes.footer',function($view){
        $view->with('categories',Category::where('category_status',1)->take(10)->get());
      });
    }
}
