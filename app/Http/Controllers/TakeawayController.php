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
        //dd(Article::all());
        return Inertia::render('TakeAway/TakeAway', [
            'articles' => Article::all(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function landing()
    {
        //dd(Article::all());
        return Inertia::render('TakeAway/TakeAwayLanding', [
            'articles' => Article::all(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
    public function remindermail(Request $request){
        return $request;
    }
    public function store(Request $request){
        $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required']
        ]);
        dd($request);
    }
}
