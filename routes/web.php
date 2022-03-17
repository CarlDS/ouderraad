<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AssortimentController;
use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/take-away', function() {
    return Inertia::render('TakeAway/TakeAway', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('takeaway');

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
