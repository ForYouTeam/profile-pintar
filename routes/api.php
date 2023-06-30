<?php

use App\Http\Controllers\cms\JabatanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v2/jabatan')->controller(JabatanController::class)->group(function()
{
    Route::get   ('/'    , 'getAllData' );
    Route::post  ('/'    , 'upsertData' );
    Route::get   ('/{id}', 'getDataById');
    Route::delete('/{id}', 'deleteData' );
});
