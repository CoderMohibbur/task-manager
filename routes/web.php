<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/about',function(){
    return view('about');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
