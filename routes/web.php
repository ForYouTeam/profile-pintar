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
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('landing');

Route::get('/dashboard', [DashboardController::class, 'getView'])->name('dashboard');
Route::get('/jabatan'  , [JabatanController  ::class, 'getView'])->name('jabatan'  );
Route::get('/jabatan'  , [JabatanController  ::class, 'getView'])->name('jabatan'  );
Route::get('/devisi'   , [DevisiController   ::class, 'getView'])->name('devisi'   );
Route::get('/sektor'   , [SektorController   ::class, 'getView'])->name('sektor'   );
Route::get('/profile'  , [ProfileController  ::class, 'getView'])->name('profile'  );
Route::get('/anggota'  , [AnggotaController  ::class, 'getView'])->name('anggota'  );
Route::get('/galeri'   , [GaleriController   ::class, 'getView'])->name('galeri'   );
Route::get('/postingan', [PostinganController::class, 'getView'])->name('postingan');
Route::get('/komentar' , [KomentarController ::class, 'getView'])->name('komentar' );
Route::get('/akun'     , [AkunController     ::class, 'getView'])->name('akun'     );
