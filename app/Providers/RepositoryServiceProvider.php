<?php

namespace App\Providers;

use App\Interfaces\DevisiInterface;
use App\Interfaces\JabatanInterface;
use App\Interfaces\SektorInterface;
use App\Repositories\DevisiRepository;
use App\Repositories\JabatanRepository;
use App\Repositories\SektorRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JabatanInterface::class, JabatanRepository::class);
        $this->app->bind(DevisiInterface ::class, DevisiRepository ::class);
        $this->app->bind(SektorInterface ::class, SektorRepository ::class);
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
