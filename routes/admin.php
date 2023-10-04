<?php

/**Admin Routes */

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\AdminReviewController;
use App\Http\Controllers\Backend\AdminVendorController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BackorderController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogCommentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerCreditSettingController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSeleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\HomePageSettingsController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PayPalSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductPolicyController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RazorpaySettingController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorConditionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\VendorReqeustController;
use App\Http\Controllers\Frontend\PageController;
use App\Models\AdminReview;
use App\Models\Backorder;
use App\Models\Category;
use App\Models\ProductImageGallery;
use App\Models\ShoppingRule;
use App\Models\transactions;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/**profile route*/

Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

/**Slider route*/
Route::resource('slider', SliderController::class);

/**category route*/
Route::put("change-status", [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::get('move-up/{id}', [CategoryController::class, 'moveUp'])->name('category.moveUp');
Route::get('move-down/{id}', [CategoryController::class, 'moveDown'])->name('category.moveDown');
Route::resource('category', CategoryController::class);

/**sub-category route*/
Route::put("subcategory/subchange-status", [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::get('subcategory/move-up/{id}', [SubCategoryController::class, 'moveUp'])->name('sub-category.moveUp');
Route::get('subcategory/move-down/{id}', [SubCategoryController::class, 'moveDown'])->name('sub-category.moveDown');
Route::resource('sub-category', SubCategoryController::class);

/**sub-category route*/
Route::put("childcategory/subchange-status", [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('childcategory/move-up/{id}', [ChildCategoryController::class, 'moveUp'])->name('child-category.moveUp');
Route::get('childcategory/move-down/{id}', [ChildCategoryController::class, 'moveDown'])->name('child-category.moveDown');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategory'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

/**brand route*/
Route::put("brand/subchange-status", [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

/**vendor route*/
Route::resource('vendor-profile', AdminVendorController::class);

/**product route*/
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/child-subcategories', [ProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product', ProductController::class);
/**product gallery image route*/
Route::resource('product-image-gallery', ProductImageGalleryController::class);
//*product variant route*/
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);

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
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

//*coupon route*/
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

//*backorder*/
Route::put('backorder/change-status', [CouponController::class, 'changeStatus'])->name('backorder.change-status');
Route::resource('backorder', BackorderController::class);


//*setting route*/
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('generale-setting-update', [SettingController::class, 'generalSettingUpdate'])->name('generale-setting-update');
Route::put('email-setting-update', [SettingController::class, 'emailSettingUpdate'])->name('email-setting-update');
Route::put('logo-setting-update', [SettingController::class, 'logoSettingUpdate'])->name('logo-setting-update');

//*setting route*/
Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers.index');
Route::delete('subscribers/{id}', [SubscribersController::class, 'destory'])->name('subscribers.destory');
Route::post('subscribers-send-mail', [SubscribersController::class, 'sendMail'])->name('subscribers-send-mail');

/**Advertisement */
Route::put('advertisement/homepage-banner-secion-one', [AdvertisementController::class, 'homepageBannerSecionOne'])->name('homepage-banner-secion-one');
Route::put('advertisement/homepage-banner-secion-two', [AdvertisementController::class, 'homepageBannerSecionTwo'])->name('homepage-banner-secion-two');
Route::put('advertisement/homepage-banner-secion-three', [AdvertisementController::class, 'homepageBannerSecionThree'])->name('homepage-banner-secion-three');
Route::put('advertisement/homepage-banner-secion-four', [AdvertisementController::class, 'homepageBannerSecionFour'])->name('homepage-banner-secion-four');
Route::put('advertisement/product-banner', [AdvertisementController::class, 'productBanner'])->name('product-banner');
Route::put('advertisement/cart-banner', [AdvertisementController::class, 'cartBanner'])->name('cart-banner');

Route::get('advertisement', [AdvertisementController::class, 'index'])->name('advertisement.index');


//*home page route*/
Route::get('home-page-setting', [HomePageSettingsController::class, 'index'])->name('home-page-setting');
Route::put('popular-category-setting', [HomePageSettingsController::class, 'updatePopularCategory'])->name('popular-category-setting');
Route::put('product-slider-section-one', [HomePageSettingsController::class, 'updateProductSliderSectionOne'])->name('product-slider-section-one');
Route::put('product-slider-section-two', [HomePageSettingsController::class, 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three', [HomePageSettingsController::class, 'updateProductSliderSectionThree'])->name('product-slider-section-three');


/**Payment settings routs */
Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting.index');
Route::resource('paypal-setting', PayPalSettingController::class);
Route::put('stripe-setting/{id}', [StripeSettingController::class, 'update'])->name('stripe-setting.update');
Route::put('cod-setting/{id}', [CodSettingController::class, 'update'])->name('cod-setting.update');
Route::put('customer-credit-setting/{id}', [CustomerCreditSettingController::class, 'update'])->name('customer-credit-setting.update');

/**orders */
Route::resource('orders', OrderController::class);
Route::put('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');

Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders', [OrderController::class, 'droppedOfOrders'])->name('dropped-off-orders');

Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');

//* reviews routes*/
Route::get('reviews', [AdminReviewController::class, 'index'])->name('review.index');
Route::put('reviews/change-status', [AdminReviewController::class, 'changeStatus'])->name('reviews.change-status');


//* transaction */
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

//foooters */
Route::resource('footer-info', FooterInfoController::class);
Route::resource('footer-socials', FooterSocialController::class);
Route::put('footer-socials/change-status', [FooterSocialController::class, 'changeStatus'])->name('footer-socials.change-status');

Route::put('footer-grid-two/change-status', [FooterGridTwoController::class, 'changeStatus'])->name('footer-grid-two.change-status');
Route::put('footer-grid-two/change-title', [FooterGridTwoController::class, 'changeTitle'])->name('footer-grid-two.change-title');
Route::resource('footer-grid-two', FooterGridTwoController::class);

Route::put('footer-grid-three/change-status', [FooterGridThreeController::class, 'changeStatus'])->name('footer-grid-three.change-status');
Route::put('footer-grid-three/change-title', [FooterGridThreeController::class, 'changeTitle'])->name('footer-grid-three.change-title');
Route::resource('footer-grid-three', FooterGridThreeController::class);
//vendor route */
Route::get('vendor-requests', [VendorReqeustController::class, 'index'])->name('vendor-requests.index');
Route::get('vendor-requests/{id}/show', [VendorReqeustController::class, 'show'])->name('vendor-requests.show');
Route::put('vendor-requests/{id}/change-status', [VendorReqeustController::class, 'changeStatus'])->name('vendor-requests.change-status');

//* coustomer list routes*/
// Route::get('customers', [CustomerListController::class, 'index'])->name('customers.index');
Route::post('customers/update/{id}', [CustomerListController::class, 'update'])->name('customer.update');
Route::post('customers/updatepassword/{id}', [CustomerListController::class, 'updatePassword'])->name('customer.update.password');
Route::put('customer/status-change', [CustomerListController::class, 'changeStatus'])->name('customer.status-change');
Route::resource('customers', CustomerListController::class);

//* vendor list routes*/
Route::get('vendor-list', [VendorListController::class, 'index'])->name('vendor-list.index');
Route::put('vendor-list/status-change', [VendorListController::class, 'changeStatus'])->name('vendor-list.status-change');

Route::get('vendor-condition', [VendorConditionController::class, 'index'])->name('vendor-condition.index');
Route::put('vendor-condition/update', [VendorConditionController::class, 'update'])->name('vendor-condition.update');
/** about routes */
Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
/** about routes */
Route::get('product-policy', [ProductPolicyController::class, 'index'])->name('product-policy.index');
Route::put('product-policy/update', [ProductPolicyController::class, 'update'])->name('product-policy.update');
/** terms and conditons routes */
Route::get('terms-and-conditions', [TermsAndConditionController::class, 'index'])->name('terms-and-conditions.index');
Route::put('terms-and-conditions/update', [TermsAndConditionController::class, 'update'])->name('terms-and-conditions.update');
/** manage user routes */
Route::get('manage-user', [ManageUserController::class, 'index'])->name('manage-user.index');
Route::post('manage-user', [ManageUserController::class, 'create'])->name('manage-user.create');
/** admin list routes */
Route::get('admin-list', [AdminListController::class, 'index'])->name('admin-list.index');
Route::put('admin-list/status-change', [AdminListController::class, 'changeStatus'])->name('admin-list.status-change');
Route::delete('admin-list/{id}', [AdminListController::class, 'destory'])->name('admin-list.destory');
/**Blog route */
Route::put('blog-category/status-change', [BlogCategoryController::class, 'changeStatus'])->name('blog-category.status-change');
Route::resource('blog-category', BlogCategoryController::class);
Route::put('blog/status-change', [AdminListController::class, 'changeStatus'])->name('blog.status-change');
Route::resource('blog', BlogController::class);
Route::get('blog-comments', [BlogCommentController::class, 'index'])->name('blog-comments.index');
Route::delete('blog-comments/{id}/destory', [BlogCommentController::class, 'destory'])->name('blog-comments.destory');



