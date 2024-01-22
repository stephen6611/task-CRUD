<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;


Route::prefix('penduduk')->name('penduduk.')->group(function () {

    Route::middleware(['guest:penduduk','PreventBackHistory'])->group(function () {
        Route::view('/login','back.pages.penduduk.auth.login')->name('login');
        Route::post('/login_handler',[PendudukController::class,'loginHandler'])->name('login_handler');
    });

    Route::middleware(['auth:penduduk','PreventBackHistory'])->group(function () {
        Route::view('/home','back.pages.penduduk.home')->name('home');
        Route::post('/logout_handler',[PendudukController::class,'logoutHandler'])->name
        ('logout_handler');
        Route::get('/profile',[PendudukController::class,'profileView'])->name('profile');
    });
});
