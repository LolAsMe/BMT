<?php

namespace App\Providers;

use App\Models\Jabatan;
use App\Services\BMTService;
use App\Services\KodeGeneratorService;
use Cache;
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
            return new BMTService(config('bmt.default_karyawan_password','123456'),$this->app->make(KodeGeneratorService::class));
        });

        $this->app->bind(KodeGeneratorService::class, function($app){
            return new KodeGeneratorService();
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
        // $cachedData = Cache::remember('jabatan', now()->addHours(24), function () {
        //     return Jabatan::all(); // Replace with your query to load the data
        // });
        Relation::morphMap([
            'DetailSimpanan' => 'App\Models\DetailSimpanan',
            'DetailPembiayaan' => 'App\Models\DetailPembiayaan',
            'DetailKas' => 'App\Models\DetailKas',
        ]);
    }
}
