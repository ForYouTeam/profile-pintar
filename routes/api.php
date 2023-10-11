<?php

use App\Http\Controllers\cms\AkunController;
use App\Http\Controllers\cms\AnggotaController;
use App\Http\Controllers\cms\DashboardController;
use App\Http\Controllers\cms\DevisiController;
use App\Http\Controllers\cms\GaleriController;
use App\Http\Controllers\cms\JabatanController;
use App\Http\Controllers\cms\KomentarController;
use App\Http\Controllers\cms\PostinganController;
use App\Http\Controllers\cms\ProfileController;
use App\Http\Controllers\cms\SektorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v2/jabatan')->controller(JabatanController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/devisi')->controller(DevisiController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/sektor')->controller(SektorController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/profile')->controller(ProfileController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/galeri')->controller(GaleriController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/postingan')->controller(PostinganController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/komentar')->controller(KomentarController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/anggota')->controller(AnggotaController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/akun')->controller(AkunController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});

Route::prefix('v2/dashboard')->controller(DashboardController::class)->group(function()
{
    Route::get   ('/'    , 'getPostCount');
});