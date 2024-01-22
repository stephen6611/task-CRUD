<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:user'])->group(function () {
        Route::view('/login','back.pages.user.auth.login')->name('login');
    });

    Route::middleware(['auth:users'])->group(function () {
        Route::view('/home','back.pages.user.home')->name('home');
    });
});
