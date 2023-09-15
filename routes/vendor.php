<?php
/**Vendor Routes */

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Frontend\VendorProductReviewController;
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

Route::resource('product-image-gallery', VendorProductImageGalleryController::class);

Route::put('product-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('product-variant', VendorProductVariantController::class);

// //*product variant item route*/
Route::get('product-variant-item/{productId}/{variantId}', [VendorProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}', [VendorProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item', [VendorProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{variantItemId}', [VendorProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}', [VendorProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::delete('product-variant-item/{variantItemId}', [VendorProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');
Route::put('product-variant-item-status', [VendorProductVariantItemController::class, 'chageStatus'])->name('product-variant-item.chages-status');
// //*order route*/
Route::get('orders', [VendorOrderController::class, 'index'])->name('orders.index');
Route::get('orders/show/{id}', [VendorOrderController::class, 'show'])->name('orders.show');
Route::get('orders/status/{id}', [VendorOrderController::class, 'orderStatus'])->name('orders.status');

//review route*/
Route::get('reviews',[VendorProductReviewController::class,'index'])->name('review.index');
