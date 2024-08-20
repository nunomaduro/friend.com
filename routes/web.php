<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dispatch', function () {
    dispatch(function () {
        \App\Models\User::factory()->create();
    });

    return 'done';
});

Route::get('/result', function () {
    return \App\Models\User::count();
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
