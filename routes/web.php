<?php

use App\Http\Controllers\cms\DevisiController;
use App\Http\Controllers\cms\JabatanController;
use App\Http\Controllers\cms\ProfileController;
use App\Http\Controllers\cms\SektorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('pages.Dashboard');
})->name('dashboard');

Route::get('/jabatan' , [JabatanController ::class, 'getView'])->name('jabatan' );
Route::get('/devisi'  , [DevisiController  ::class, 'getView'])->name('devisi'  );
Route::get('/sektor'  , [SektorController  ::class, 'getView'])->name('sektor'  );
Route::get('/profile' , [ProfileController ::class, 'getView'])->name('profile' );