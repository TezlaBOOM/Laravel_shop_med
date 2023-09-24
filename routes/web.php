<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\ProductTrackController;
use App\Http\Controllers\Frontend\paymentController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProductReviewController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\UserVendorReqeustController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

/**vendor page route */
Route::get('vendorpage', [HomeController::class, 'page'])->name('vendorPage.index');
Route::get('vendor-prouct/{id}', [HomeController::class, 'vendorProductsPage'])->name('vendorPage.products');


Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');

Route::get('products', [FrontendProductController::class, 'productsIndex'])->name('products.index');
Route::get('product-detail/{slug}', [FrontendProductController::class, 'index'])->name('product-detail');
Route::get('change-product-list-view', [FrontendProductController::class, 'changeListView'])->name('change-product-list-view');

/**add product to card */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class, 'CartDetails'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart-count');
Route::get('cart-products', [CartController::class, 'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product', [CartController::class, 'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-total', [CartController::class, 'cartTotal'])->name('cart.sidebar-product-total');
Route::get('apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation', [CartController::class, 'couponCalculation'])->name('coupon-calculation');

/**Newsletter */
Route::post('newsletter-request', [NewsletterController::class, 'newsletterRequest'])->name('newsletter-request');
Route::get('newsletter-verify/{token}', [NewsletterController::class, 'newsLetterEmailVarify'])->name('newsletter-verify');
/** about page route */
Route::get('about', [PageController::class, 'about'])->name('about');
/** terms and conditions page route */
Route::get('terms-and-conditions', [PageController::class, 'termsAndCondition'])->name('terms-and-conditions');
/** Contact route */
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::post('contact', [PageController::class, 'handleContactForm'])->name('handle-contact-form');
/**Product track route */
Route::get('product-traking', [ProductTrackController::class, 'index'])->name('product-traking.index');

Route::get('blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');
Route::get('blog', [BlogController::class, 'blog'])->name('blog');





Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    // //*order route*/
    Route::get('orders', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/show/{id}', [UserOrderController::class, 'show'])->name('orders.show');
    //user wishlist route
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('wishlist/add-product', [WishlistController::class, 'addToWishList'])->name('wishlist.store');
    Route::get('wishlist/remove-product/{id}', [WishlistController::class, 'destory'])->name('wishlist.destory');
    /**vendor request route */
    Route::get('vendor-request', [UserVendorReqeustController::class, 'index'])->name('vendor-request.index');
    Route::post('vendor-request', [UserVendorReqeustController::class, 'create'])->name('vendor-request.create');


    //user address route
    Route::resource('address', UserAddressController::class);
    /** blog comment route*/
    Route::post('blog-comment', [BlogController::class, 'comment'])->name('blog-comment');

    //Checkout route
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('checkout/address-create', [CheckOutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.form-submit');
    //payment route
    Route::get('payment', [paymentController::class, 'index'])->name('payment');
    Route::get('payment-success', [paymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('payment-cancel', [paymentController::class, 'paymentCancel'])->name('payment.cancel');

    Route::get('paypal/payment', [paymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [paymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [paymentController::class, 'paypalCancel'])->name('paypal.cancel');

    Route::post('stripe/payment', [paymentController::class, 'payWithStripe'])->name('stripe.payment');
    Route::get('stripe/success', [paymentController::class, 'stripeSuccess'])->name('stripe.success');
    Route::get('stripe/cancel', [paymentController::class, 'stripeCancel'])->name('stripe.cancel');

    Route::get('cod/payment', [paymentController::class, 'payWithCod'])->name('cod.payment');
    Route::get('customer-credit/payment', [paymentController::class, 'payWithCustomerCredit'])->name('customer-credit.payment');



    //product review routes
    Route::post('review', [ReviewController::class, 'create'])->name('review.create');

    //user review routes
    Route::get('reviews', [ReviewController::class, 'index'])->name('review.index');
});
