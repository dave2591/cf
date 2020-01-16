<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /** @var string */
    protected $namespace = 'App\Http\Actions';

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * @return void
     */
    public function map()
    {
        Route::prefix('api')
            ->group(base_path('routes/api.php'));
    }
}
