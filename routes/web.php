<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Shop
Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store');
Route::get('/store/{product}', [App\Http\Controllers\StoreController::class, 'show'])->name('store.show');
Route::get('/search', [App\Http\Controllers\StoreController::class, 'search'])->name('search');
Route::get('/cart',  [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart',  [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::get('/cart/incr/{id}/{qty}',  [App\Http\Controllers\CartController::class, 'incr'])->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}',  [App\Http\Controllers\CartController::class, 'decr'])->name('cart.decr');
Route::delete('/cart/{product}',  [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/{product}',  [App\Http\Controllers\CartController::class, 'wishlist'])->name('cart.wishlist');
//product Rating
Route::post('/review',[App\Http\Controllers\StoreController::class, 'review'])->name('review.store');
// wishlist
Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'] )->name('wishlist.index');
Route::post('/wishlist/{product}',[App\Http\Controllers\WishlistController::class,'switchToCart'])->name('wishlist.show');//add to cart
Route::delete('/wishlist/{product}',[App\Http\Controllers\WishlistController::class, 'destroy'])->name('wishlist.destroy');//delete item
//Blog
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [App\Http\Controllers\BlogController::class, 'show'])->name('post.show');
Route::post('/comment/{post_id}', [App\Http\Controllers\CommentsController::class, 'store'])->name('comments.store');
Route::get('/postSearch',  [App\Http\Controllers\BlogController::class, 'search'])->name('post.search');
//profile
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile.show');
Route::patch('/profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.edit');

//checkout
// Route::get('stripe', [App\Http\Controllers\CheckoutController::class, 'stripe']);
Route::post('stripe', [App\Http\Controllers\CheckoutController::class, 'stripePost'])->name('stripe.post');
Route::get('/checkout',  [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');

Auth::routes();
/* ############ admin routes ##############*/
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', 'UserController' , ['except' => ['show', 'create', 'store']]);
    Route::resource('categories', 'CategoryController' , ['except' => ['show']]);
    Route::resource('brands', 'BrandsController' , ['except' => ['show']]);
    Route::resource('tags', 'TagController' , ['except' => ['show']]);
    Route::resource('posts', 'PostController' , ['except' => ['show']]);
    Route::resource('products', 'ProductController' , ['except' => ['show']]);
    Route::resource('orders', 'OrderController' , ['except' => ['create']]);
});
/* ############ admin routes ##############*/