<?php

/**Admin Routes */

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

/**profile route*/

Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');
Route::get('profile',[ProfileController::class, 'index'])->name('profile');

Route::resource('slider',SliderController::class);