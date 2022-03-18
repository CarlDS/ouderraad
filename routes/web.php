<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AssortimentController;
use App\Http\Controllers\EventController;
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

Route::get('/', [TakeawayController::class, 'landing']);
Route::get('/take-away', [TakeawayController::class, 'landing']
)->name('takeaway');
Route::get('/TAKE-AWAY', [TakeawayController::class, 'landing']
)->name('takeaway2');

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
