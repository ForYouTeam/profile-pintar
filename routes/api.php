<?php

use App\Http\Controllers\cms\DevisiController;
use App\Http\Controllers\cms\JabatanController;
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