<?php

/**Admin Routes */

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

/**profile route*/

Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');
Route::get('profile',[ProfileController::class, 'index'])->name('profile');

/**Slider route*/
Route::resource('slider',SliderController::class);

/**category route*/
Route::put("change-status",[CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category',CategoryController::class);

/**sub-category route*/
Route::put("subcategory/subchange-status",[SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category',SubCategoryController::class);

/**sub-category route*/
Route::put("childcategory/subchange-status",[ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories',[ChildCategoryController::class, 'getSubCategory'])->name('get-subcategories');
Route::resource('child-category',ChildCategoryController::class);

/**brand route*/
Route::put("brand/subchange-status",[BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand',BrandController::class);

/**vendor route*/
Route::resource('vendor-profile',AdminVendorController::class);