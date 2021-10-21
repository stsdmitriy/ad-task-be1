<?php

namespace App\Providers;

use App\Services\ProgramComponent\Interfaces\BuilderInterface;
use App\Services\ProgramComponent\ProgramBuilder;
use Illuminate\Support\ServiceProvider;

class ProgramBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BuilderInterface::class, function () {
            return new ProgramBuilder();
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
    }
}
