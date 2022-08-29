<?php

namespace App\Providers;

use App\Services\BMTService;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class BMTServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(BMTService::class, function($app){
            return new BMTService(config('bmt.default_karyawan_password','123456'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Relation::morphMap([
            'DetailSimpanan' => 'App\Models\DetailSimpanan',
            'DetailPembiayaan' => 'App\Models\DetailPembiayaan',
            'DetailKas' => 'App\Models\DetailKas',
        ]);
    }
}
