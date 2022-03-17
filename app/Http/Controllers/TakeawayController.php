<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class TakeawayController extends Controller
{
    public function show()
    {

        return Inertia::render('TakeAway/TakeAway', [
            'articles' => Article::all(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
