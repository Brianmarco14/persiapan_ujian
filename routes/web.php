<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\ForuserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::resource('dasboard', DasboardController::class);
    Route::resource('user', ForuserController::class);
});

Route::middleware('auth')->group(function () {
    
    Route::resource('artikel', ArtikelController::class);
    Route::resource('kategori', KategoriController::class);
});

Route::resource('/', LandingController::class);
