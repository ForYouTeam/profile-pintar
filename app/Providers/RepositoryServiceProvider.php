<?php

namespace App\Providers;

use App\Interfaces\AnggotaInterface;
use App\Interfaces\DevisiInterface;
use App\Interfaces\GaleriInterface;
use App\Interfaces\JabatanInterface;
use App\Interfaces\KomentarInterface;
use App\Interfaces\PostinganInterface;
use App\Interfaces\ProfileInterface;
use App\Interfaces\SektorInterface;
use App\Repositories\AnggotaRepository;
use App\Repositories\DevisiRepository;
use App\Repositories\GaleriRepository;
use App\Repositories\JabatanRepository;
use App\Repositories\KomentarRepository;
use App\Repositories\PostinganRepository;
use App\Repositories\ProfileRepository;
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
        $this->app->bind(JabatanInterface   ::class, JabatanRepository   ::class);
        $this->app->bind(DevisiInterface    ::class, DevisiRepository    ::class);
        $this->app->bind(SektorInterface    ::class, SektorRepository    ::class);
        $this->app->bind(ProfileInterface   ::class, ProfileRepository   ::class);
        $this->app->bind(GaleriInterface    ::class, GaleriRepository    ::class);
        $this->app->bind(PostinganInterface ::class, PostinganRepository ::class);
        $this->app->bind(KomentarInterface  ::class, KomentarRepository  ::class);
        $this->app->bind(AnggotaInterface   ::class, AnggotaRepository   ::class);
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
