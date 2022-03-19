<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

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
        view()->composer('*', function($view){
	        $UserMenu = app('App\Http\Controllers\MenuController')->getUserMenu();
	        $view->with('usermenu', $UserMenu);
        });

        view()->composer('*', function($view){
	        $Favourites = app('App\Http\Controllers\FavouritesController')->getFavouritesWidget();
	        $view->with('favouriteswidget', $Favourites);
        });

        Paginator::useBootstrap();
        
        //view()->composer('*', function($view){
	    //   $Favourites = app('App\Http\Controllers\FavouriteController')->getFavouritesWidget();
	   //    $view->with('favouriteswidget', $Favourites); 
       // });
    }
}
