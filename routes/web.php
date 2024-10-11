<?php
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ThankyouController;
use App\Http\Controllers\UserOrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RevenueController;

use Illuminate\Support\Facades\Route;

// Home and Shop Routes
Route::get('/', [AppController::class, 'index'])->name('app.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ShopController::class, 'productDetails'])->name('shop.product.details');
Route::get('/cart-wishlist-count', [ShopController::class, 'getCartAndWishlistCount'])->name('shop.cart.wishlist.count');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

// Wishlist Routes
Route::get('/wishlist', [WishlistController::class, 'getWishlistedProducts'])->name('wishlist.list');
Route::post('/wishlist/add', [WishlistController::class, 'addProductToWishlist'])->name('wishlist.store');
Route::delete('/wishlist/remove', [WishlistController::class, 'removeProductFromWishlist'])->name('wishlist.remove');
Route::delete('/wishlist/clear', [WishlistController::class, 'clearWishlist'])->name('wishlist.clear');
Route::post('/wishlist/move-to-cart', [WishlistController::class, 'moveToCart'])->name('wishlist.move.to.cart');

// Checkout Routes
Route::middleware('auth')->group(function() {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/thankyou', [ThankyouController::class, 'index'])->name('thankyou.index');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    // User Routes
    Route::get('/users', [UserController::class, 'all_user'])->name('all_user');
    Route::get('/users/create', [UserController::class, 'show_create_user'])->name('create_user');
    Route::post('/users/create/save', [UserController::class, 'create_user'])->name('create_user');    Route::get('/users/{id}/edit', [UserController::class, 'show_edit_user'])->name('edit_user');
    Route::post('/users/{id}/edit/save', [UserController::class, 'edit_user'])->name('update_user');
    Route::delete('/users/{id}/delete', [UserController::class, 'delete_user'])->name('delete_user');
    Route::get('/users/{id}/detail', [UserController::class, 'detail_user'])->name('detail_user');

    // Order Routes
    Route::get('/orders', [OrderController::class, 'all_order'])->name('all_order');
    Route::get('/orders/{id}/edit', [OrderController::class, 'show_edit_order'])->name('edit_order');
    Route::post('/orders/{id}/edit', [OrderController::class, 'edit_order']);
    Route::delete('/orders/{id}/delete', [OrderController::class, 'delete_order'])->name('delete_order');
    // Product Routes
    Route::get('/products', [ProductController::class, 'all_product'])->name('all_product');
    Route::get('product/create', [ProductController::class, 'show_create_product'])->name('create_product');
    Route::post('product/create/save', [ProductController::class, 'create_product'])->name('create_product');;
    Route::get('/products/{id}/edit', [ProductController::class, 'show_edit_product'])->name('edit_product');
    Route::post('/products/{id}/edit', [ProductController::class, 'edit_product']);
    Route::delete('/admin/products/{id}/delete', [ProductController::class, 'delete_product'])->name('delete_product');
    Route::post('/admin/products/edit/save/{id}', [ProductController::class, 'edit_product'])->name('update_product');

    // Brand Routes

    Route::get('brands', [BrandController::class, 'all_brand'])->name('all_brand');
    Route::get('brand/create', [BrandController::class, 'show_create_brand'])->name('create_brand');
    Route::post('brand/create/save', [BrandController::class, 'create_brand']);
    Route::get('brands/{id}/edit', [BrandController::class, 'show_edit_brand'])->name('edit_brand');
    Route::post('brands/{id}/edit', [BrandController::class, 'edit_brand'])->name('edit_brand');
    Route::delete('brands/{id}/delete', [BrandController::class, 'delete_brand'])->name('delete_brand');
    Route::post('/brands/edit/save/{id}', [BrandController::class, 'update'])->name('update_brand');

    // Category Routes
    Route::get('category', [CategoryController::class, 'all_category'])->name('all_category');
    Route::get('/admin/category/create', [CategoryController::class, 'show_create_category'])->name('create_category_page');
    Route::post('/admin/category/create/save', [CategoryController::class, 'create_category'])->name('save_category');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'show_edit_category'])->name('edit_category');
    Route::post('/admin/category/edit/save/{id}', [CategoryController::class, 'edit_category'])->name('update_category');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');

    // Gallery Routes
    Route::get('/admin/gallery', [GalleryController::class, 'all_galleries'])->name('all_gallery');
    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])->name('create_gallery');
    Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('store_gallery');
    Route::get('/admin/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('edit_gallery');
    Route::put('/admin/gallery/update/{id}', [GalleryController::class, 'update'])->name('update_gallery');
    Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('delete_gallery');

    // Contacts Routes
    Route::get('/contacts', [ContactController::class, 'all_contact'])->name('all_contact');
    Route::get('/contacts/{id}', [ContactController::class, 'show_contact'])->name('show_contact');
    Route::delete('/contacts/{id}', [ContactController::class, 'delete_contact'])->name('delete_contact');

    // Revenue Routes
    Route::get('/admin/revenue', [RevenueController::class, 'revenue'])->name('revenue');
    Route::get('/admin/revenue/export-csv', [RevenueController::class, 'exportCsv'])->name('admin.revenue.exportCsv');
});




// Contact Route
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'sendMessage'])->name('contact.send');

Route::get('/about', [AboutUsController::class, 'index'])->name('about');


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// User Account Routes
Route::middleware('auth')->group(function () {
    Route::get('/my-account', [UserController::class, 'index_user'])->name('user.index');
    Route::get('/my-orders', [UserOrdersController::class, 'index'])->name('user.orders.index');
    Route::get('/account', [UserController::class, 'edit_own_account'])->name('users.account.edit');
    Route::post('/account/update', [UserController::class, 'update_own_account'])->name('users.account.update');
    Route::get('/orderdetail/{id}', [UserOrdersController::class, 'view'])->name('user.orders.view');
    Route::delete('/users/account/delete', [UserController::class, 'deleteAccount'])->name('users.account.delete');
    Route::patch('/orders/{id}/cancel', [UserOrdersController::class, 'cancelOrder'])->name('user.orders.cancel');
});

// Admin Dashboard Route
Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/contact-us', [AdminContactController::class, 'index'])->name('admin.contact');
});
// Authentication Routes
Auth::routes();

?>