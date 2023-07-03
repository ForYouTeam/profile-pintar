<?php

use App\Http\Controllers\cms\DevisiController;
use App\Http\Controllers\cms\JabatanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('pages.Dashboard');
})->name('dashboard');

Route::get('/jabatan', [JabatanController::class, 'getView'])->name('jabatan');
Route::get('/devisi' , [DevisiController ::class, 'getView'])->name('devisi' );