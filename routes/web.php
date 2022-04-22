<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AssortimentController;
use App\Http\Controllers\BeheersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TakeawayController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
/* Route::post('/ordernew', [OrderController::class, 'storenew'])->name('ordernew');
Route::post('/order', [OrderController::class, 'store'])->name('order'); */
Route::post('/payed', [BeheersController::class, 'pay'])->name('pay');

/* Route::get('/', [TakeawayController::class, 'show']); */


/* Route::get('/take-away', [TakeawayController::class, 'newversion'])->name('takeaway'); */
/* Route::get('/take-awayold', [TakeawayController::class, 'show']
)->name('takeawayold');
Route::get('/TAKE-AWAY', [TakeawayController::class, 'landing']
); */

Route::middleware(['auth:sanctum', 'verified'])->get('/take-away/beheer', [BeheersController::class, 'beheer'])->name('beheer');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix('event')->controller(EventController::class)->group(function (){
    Route::get('/', 'index')->name('events');
    Route::get('/create', 'create')->name('event.create');
    Route::get('/{event}', 'show')->name('event.show');

    Route::post('/', 'store')->name('event.store');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('assortiment')->controller(AssortimentController::class)->group(function (){
    Route::post('/', 'store')->name('assortiment.store');
});
