<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'profile']);
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name("profile");
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
    Route::resource('group', \App\Http\Controllers\GroupController::class);
    Route::resource('info', \App\Http\Controllers\InfoController::class);
    Route::resource('bot', \App\Http\Controllers\BotController::class);

});
