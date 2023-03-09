<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

// Auth::routes([
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard'),
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')
// ]);

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User
    Route::resource('users', UserController::class);

    //Generate URL
    Route::get('/generate-url', [UrlController::class, 'generateUrl'])->name('url.generateUrl');
    Route::post('/generate-url/store', [UrlController::class, 'store'])->name('url.store');
    Route::get('{id}', [UrlController::class, 'latestUrl'])->name('url.latestUrl');
    Route::get('/edit-url/{id}', [UrlController::class, 'edit'])->name('url.edit');
    Route::put('/edit-url/{id}', [UrlController::class, 'update'])->name('url.update');
    Route::delete('/destroy-url/{id}', [UrlController::class, 'destroy'])->name('url.destroy');
    Route::get('/archive-url', [UrlController::class, 'archiveUrl'])->name('url.archiveUrl');

});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
