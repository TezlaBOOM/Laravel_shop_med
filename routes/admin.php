<?php

/**Admin Routes */

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\FlashSeleController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Models\Category;
use App\Models\ProductImageGallery;
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

/**product route*/
Route::get('product/get-subcategories',[ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/child-subcategories',[ProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product',ProductController::class);
/**product gallery image route*/
Route::resource('product-image-gallery',ProductImageGalleryController::class);
//*product variant route*/
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('product-variant',ProductVariantController::class);

//*product variant item route*/
Route::get('product-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item', [ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::delete('product-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');
Route::put('product-variant-item-status', [ProductVariantItemController::class, 'chageStatus'])->name('product-variant-item.chages-status');

//*seller product route*/
Route::get('seller-product', [SellerProductController::class, 'index'])->name('seller-product.index');
Route::get('seller-pending-product', [SellerProductController::class, 'pendingProduct'])->name('seller-pending-product.index');
Route::put('seller-approve-status', [SellerProductController::class, 'changeApproveStatus'])->name('seller-approve-status');

//*Flash sale route*/
Route::get('flash-sale', [FlashSeleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSeleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSeleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSeleController::class, 'chageShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale-status', [FlashSeleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}', [FlashSeleController::class, 'destory'])->name('flash-sale.destory');

//*coupon route*/
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');

Route::resource('coupons', CouponController::class);



//*setting route*/
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('generale-setting-update', [SettingController::class, 'generalSettingUpdate'])->name('generale-setting-update');