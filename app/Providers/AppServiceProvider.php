<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PhieuDatDV;
use App\ChiTietDatDV;
use App\KhachHang;
use App\DichVu;
use Illuminate\Support\Facades\DB;
use Session;

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
        view()->composer('*',function($view){
            $view->with([
                'donchuagiao' => PhieuDatDV::where('TrangThai',0)->count(),
            ]);
        });
    }
}
