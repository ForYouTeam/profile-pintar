<?php

use App\Http\Controllers\cms\AkunController;
use App\Http\Controllers\cms\AnggotaController;
use App\Http\Controllers\cms\AuthController;
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

Route::get('/dashboard', [DashboardController::class, 'getView'])->middleware('auth')->name('dashboard');
Route::get('/jabatan'  , [JabatanController  ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('jabatan'  );
Route::get('/jabatan'  , [JabatanController  ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('jabatan'  );
Route::get('/devisi'   , [DevisiController   ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('devisi'   );
Route::get('/sektor'   , [SektorController   ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('sektor'   );
Route::get('/profile'  , [ProfileController  ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('profile'  );
Route::get('/anggota'  , [AnggotaController  ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('anggota'  );
Route::get('/galeri'   , [GaleriController   ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('galeri'   );
Route::get('/postingan', [PostinganController::class, 'getView'])->middleware('auth', 'role:super-admin|admin')->name('postingan');
Route::get('/komentar' , [KomentarController ::class, 'getView'])->middleware('auth', 'role:super-admin|admin')->name('komentar' );
Route::get('/akun'     , [AkunController     ::class, 'getView'])->middleware('auth', 'role:super-admin')->name('akun'     );


Route::get ('/login'         , [AuthController ::class, 'index'  ])->name('login'         );
Route::post('/login-process' , [AuthController ::class, 'login'  ])->name('login-process' );
Route::get ('/logout'        , [AuthController ::class, 'logout' ])->name('logout'        );
