<?php

use App\Livewire\ShowCategorias;
use Illuminate\Support\Facades\Route;



Route::get('categorias', ShowCategorias::class);


Route::get('/', function () {
    return view('welcome');
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