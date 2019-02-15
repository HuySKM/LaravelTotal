<?php

namespace App\Providers;

use App\Model\Admin\MenuModel;
use App\Model\Admin\MenuItemsModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        $menus = MenuModel::all();
        $menus_items = MenuItemsModel::all();

        View::share('fe_menus', $menus);
        View::share('fe_menus_items', $menus_items);
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
