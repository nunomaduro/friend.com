<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dispatch', function () {
    dispatch(function () {
        $counter = Cache::get('counter', 0);

        $counter++;

        Cache::put('counter', $counter);
    })->onQueue('database');
});

Route::get('/result', function () {
    return Cache::get('counter', 0);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
