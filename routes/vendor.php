<?php
/**Vendor Routes */

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;

/**Vendor route */
Route::get('dashboard',[VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile',[VendorProfileController::class, 'index'])->name('profile');
Route::put('profile',[VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile',[VendorProfileController::class, 'updatePassword'])->name('profile.update.password');

/**Vendor shop profile */
Route::resource('shop-profile',VendorShopProfileController::class);

/**product route*/
Route::get('product/get-subcategories',[VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/child-subcategories',[VendorProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product',VendorProductController::class);